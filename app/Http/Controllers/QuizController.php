<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\BuatSim;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;

class QuizController extends Controller
{
    public function BuatQuiz(Request $request) {
        $request->validate([
            'questions' => 'required|string',
            'opsiB' => 'required|string',
            'opsiA' => 'required|string',
            'opsiC' => 'required|string',
            'opsiD' => 'required|string',
            'answer' => 'required|string|min:1|max:1',
            'jenis_sim' => 'required|string|min:1|max:1'
        ]);
        $quiz = new Quiz();
        $quiz->questions = $request->questions;
        $quiz->opsiA = $request->opsiA;
        $quiz->opsiB = $request->opsiB;
        $quiz->opsiC = $request->opsiC;
        $quiz->opsiD = $request->opsiD;
        $quiz->answer = $request->answer;
        $quiz->jenis_sim = $request->jenis_sim;
        $quiz->save();
        return redirect()->route('show.quiz')->with('success', 'Pertantaan baru berhasil ditambahkan.');
    }

    public function ShowQuiz(Request $request) {
        $tab = $request->query('tab', 'SIM-A');
        $quizes = collect();
        if ($tab == 'SIM-A') {
            $quizes = Quiz::where('jenis_sim', 'A')->get();
        }
        elseif ($tab == 'SIM-C') {
            $quizes = Quiz::where('jenis_sim', 'C')->get();
        }
        return view('admin.showQuiz', compact('quizes', 'tab'));
    }

    public function EditQuizForm($id) {
        $quiz = Quiz::find($id);
        return view('admin.editQuiz', ['quiz' => $quiz, 'id' => $id]);
    }

    public function EditQuiz(Request $request, $id) {
        $quiz = Quiz::findOrFail($id);
        $quiz->questions = $request->questions;
        $quiz->opsiA = $request->opsiA;
        $quiz->opsiB = $request->opsiB;
        $quiz->opsiC = $request->opsiC;
        $quiz->opsiD = $request->opsiD;
        $quiz->answer = $request->answer;
        $quiz->jenis_sim = $request->jenis_sim;
        $quiz->save();

        // Redirect ke halaman tertentu atau kembali ke halaman sebelumnya
        return redirect()->route('show.quiz')->with('success', 'quiz updated successfully');
    }

    public function DeleteQuiz($id) {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect()->route('show.quiz')->with('success', 'Quiz deleted successfully');
    }

}
