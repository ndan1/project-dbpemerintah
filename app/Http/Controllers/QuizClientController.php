<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\BuatSim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowQuizClient(Request $request)
{
    $userId = auth()->user()->customer_id;
    $buatSim = BuatSim::where('id_customer', $userId)->first();
    $now = Carbon::now();
    $lastTestAt = Carbon::parse($buatSim->last_test_at);


    // if ($buatSim->test_score >= 70) {
    //     session()->flash('success', 'Selamat! Anda lulus ujian dengan skor yang memuaskan.');
    //     return view('quizresult', compact('score', 'totalQuestions', 'percentageScore'));
    // }
    if ($buatSim->test_score == NULL){
        $jenisSim = $buatSim->tipe_sim; // default to 'A' if not provided

        $quizes = Quiz::where('jenis_sim', $jenisSim)->paginate(1);
        $answers = session('quiz_answers', []);

        return view('quiz', compact('quizes', 'answers', 'jenisSim'));
    }
    if ($buatSim->test_score < 70 && $lastTestAt->diffInHours($now) < 24) {
        $remainingHours = 24 - $lastTestAt->diffInHours($now);
        return redirect()->route('home')->with('fail', "Anda harus menunggu $remainingHours jam sebelum dapat mengikuti ujian lagi.");
    }
    else{
        $jenisSim = $buatSim->tipe_sim; // default to 'A' if not provided

        $quizes = Quiz::where('jenis_sim', $jenisSim)->paginate(1);
        $answers = session('quiz_answers', []);

        return view('quiz', compact('quizes', 'answers', 'jenisSim'));
    }

}


    // public function SubmitQuiz(Request $request)
    // {
    //     // Get current page and submitted answer
    //     $currentPage = $request->input('page');
    //     $answer = $request->input('answer');

    //     // Save the answer in the session
    //     $answers = session('quiz_answers', []);
    //     $answers[$currentPage] = $answer;
    //     session(['quiz_answers' => $answers]);

    //     // Redirect to the next page
    //     return redirect()->route('show.quiz.client', ['page' => $currentPage + 1]);
    // }

    public function submitQuiz(Request $request)
    {
        $currentPage = $request->input('page');
        $answer = $request->input('answer');
        $jenisSim = $request->input('jenis_sim');

        // Ambil jawaban yang sudah ada dari session
        $existingAnswers = session('quiz_answers', []);

        // Jika $existingAnswers bukan array, ubah menjadi array kosong
        if (!is_array($existingAnswers)) {
            $existingAnswers = [];
        }

        // Simpan jawaban dari pengguna berdasarkan halaman saat ini
        $existingAnswers[$currentPage] = $answer;

        // Simpan jawaban yang diperbarui ke session
        session(['quiz_answers' => $existingAnswers]);
        session(['jenis_sim' => $jenisSim]);

        $lastPage = $request->input('last_page');
        if ($currentPage < $lastPage) {
            return redirect()->route('show.quiz.client', ['page' => $currentPage + 1, 'jenis_sim' => $jenisSim]);
        } else {
            return redirect()->route('result.show');
        }
    }



    public function calculateScore()
{
    // Ambil jawaban pengguna dari session
    $answers = session('quiz_answers', []);
    $jenisSim = session('jenis_sim', 'A');
    $userId = auth()->user()->customer_id;

    // Ambil jawaban yang benar dari database berdasarkan jenis_sim dan urutkan berdasarkan question_id
    $questions = Quiz::where('jenis_sim', $jenisSim)->orderBy('question_id')->get();

    $score = 0;
    $totalQuestions = $questions->count();
    $correctAnswers = $questions->pluck('answer', 'question_id')->toArray();

    // Bandingkan jawaban pengguna dengan jawaban yang benar berdasarkan urutan
    foreach ($answers as $page => $userAnswer) {
        // Cari question_id berdasarkan urutan halaman
        $question = $questions->get($page - 1);
        if ($question && $correctAnswers[$question->question_id] == $userAnswer) {
            $score++;
        }
    }

    $percentageScore = ($score / $totalQuestions) * 100;

    $buatSim = BuatSim::where('id_customer', $userId)->first();
    if ($buatSim) {
        $buatSim->test_score = $percentageScore;
        $buatSim->last_test_at = Carbon::now();
        $buatSim->save();
    }

    if ($percentageScore >= 70) {
        session()->flash('success', 'Selamat! Anda lulus ujian dengan skor yang memuaskan.');
    } else {
        session()->flash('fail', 'Maaf, Anda belum lulus ujian. Silakan coba lagi dalam 24 jam.');
    }

    return view('quizresult', compact('score', 'totalQuestions', 'percentageScore'));
}







}
