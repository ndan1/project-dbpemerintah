<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\BuatSim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowQuizClient(Request $request) {
        $profile = auth()->user();
        $currentPage = $request->query('page', 1);
        $jenis_sim = BuatSim::where('id_customer', $profile->customer_id)
                            ->leftJoin('users', 'users.customer_id', '=', 'pembuatan_sim.id_pembuatan')
                            ->select('tipe_sim')
                            ->first();

        $quizes = Quiz::where('jenis_sim', $jenis_sim->tipe_sim)->paginate(1); // menampilkan 1 soal per halaman
        $answers = session('quiz_answers', []);
        return view('quiz', compact('quizes', 'currentPage', 'answers'));
    }

    public function SubmitQuiz(Request $request)
    {
        // Get current page and submitted answer
        $currentPage = $request->input('page');
        $answer = $request->input('answer');

        // Save the answer in the session
        $answers = session('quiz_answers', []);
        $answers[$currentPage] = $answer;
        session(['quiz_answers' => $answers]);

        // Redirect to the next page
        return redirect()->route('show.quiz.client', ['page' => $currentPage + 1]);
    }

    public function calculateScore(Request $request) {
        $answer = $request->input('answer');
        $page = $request->input('page');
        $lastPage = $request->input('last_page');
        $answers = session('quiz_answers', []);
        Session::put('last_page', $lastPage);

        // Hitung skor
        $score = 0;
        foreach ($answers as $page => $answer) {
            $quiz = Quiz::find($page);
            if ($quiz && $quiz->answer == $answer) {
                $score++;
            }
        }

        $total = $score * 10;

        if ($total >= 70) {
            return view('quizresult', ['total' => $total])
                ->with('success', 'Anda telah lolos ujian teori. Selanjutnya, lakukan pembayaran dan pilih jadwal untuk melakukan ujian praktek.');
        } else {
            return view('quizresult', ['total' => $total])
                ->with('fail', 'Anda tidak lolos ujian teori. Anda harus menunggu 24 jam untuk melakukan ujian teori ulang.');
        }
    }



}
