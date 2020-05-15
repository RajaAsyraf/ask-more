<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Mail\ThankYouSurvey;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreSurveyRequest;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(StoreSurveyRequest $request, Questionnaire $questionnaire, $slug)
    {
        $data = $request->validated();
        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);
        Mail::to($survey->email)->send(new ThankYouSurvey($survey));
        return view('survey.thankyou', compact('questionnaire'));
    }
}
