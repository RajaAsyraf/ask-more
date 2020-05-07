<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = auth()->user()->questionnaires()->get();
        return view('questionnaire.index', compact('questionnaires'));
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);
        $questionnaire = auth()->user()->questionnaires()->create($data);
        return redirect()->route('questionnaire.show', $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {   
        $questionnaire->load('questions.answers'); // lazy loading
        return view('questionnaire.show', compact('questionnaire'));
    }
}
