<?php

// namespace App\Http\Controllers;

// use App\Models\Survey;
// use App\Models\SurveyResponse;
// use Illuminate\Http\Request;

// class SurveyResponseController extends Controller
// {
//     public function create($surveyId)
//     {
//         $survey = Survey::with('questions')->findOrFail($surveyId);
//         return view('pages.survey.survey_responses.create', compact('survey'));
//     }

//     public function store(Request $request, $surveyId)
//     {
//         $survey = Survey::with('questions')->findOrFail($surveyId);

//         foreach ($survey->questions as $question) {
//             SurveyResponse::create([
//                 'survey_id' => $surveyId,
//                 'question_id' => $question->id,
//                 'user_id' => auth()->id(), // klo ada login
//                 'jawaban' => $request->input('jawaban_'.$question->id),
//             ]);
//         }

//         return redirect()->route('survey.index')->with('success', 'Terima kasih sudah mengisi survey!');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\Survey;
// use App\Models\SurveyResponse;
// use Illuminate\Http\Request;

// class SurveyResponseController extends Controller
// {
//     // Form isi survey
//     public function create($surveyId)
//     {
//         $survey = Survey::with('questions')->findOrFail($surveyId);
//         return view('pages.survey.survey_responses.create', compact('survey'));
//     }

//     // Simpan jawaban (bisa anonim)
//     public function store(Request $request, $surveyId)
//     {
//         $survey = Survey::with('questions')->findOrFail($surveyId);

//         foreach ($survey->questions as $question) {
//             SurveyResponse::create([
//                 'survey_id' => $surveyId,
//                 'question_id' => $question->id,
//                 'user_id' => auth()->id() ?? null, // null kalau peserta nggak login
//                 'jawaban' => $request->input('jawaban_'.$question->id),
//             ]);
//         }

//         return redirect()->route('survey.public.create', $surveyId)
//                          ->with('success', 'Terima kasih sudah mengisi survey!');
//     }
// }


// namespace App\Http\Controllers;

// use App\Models\Survey;
// use App\Models\SurveyResponse;
// use Illuminate\Http\Request;

// class SurveyResponseController extends Controller
// {
//     /**
//      * Tampilkan form survey publik (tanpa login)
//      */
//     public function publicCreate($surveyId)
//     {
//         $survey = Survey::with('questions')->findOrFail($surveyId);
//         return view('pages.survey.survey_responses.public_create', compact('survey'));

//     }

//     /**
//      * Simpan jawaban peserta publik / anonim
//      */
//     public function publicStore(Request $request, $surveyId)
//     {
//         $survey = Survey::with('questions')->findOrFail($surveyId);

//         foreach ($survey->questions as $question) {
//             SurveyResponse::create([
//                 'survey_id' => $surveyId,
//                 'question_id' => $question->id,
//                 'user_id' => auth()->id() ?? null, // null kalau peserta nggak login
//                 'jawaban' => $request->input('jawaban_'.$question->id),
//             ]);
//         }

//         return redirect()->back()->with('success', 'Terima kasih sudah mengisi survey!');
//     }
// }


namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class SurveyResponseController extends Controller
{
    public function publicCreate($surveyId)
    {
        $survey = Survey::with('questions')->findOrFail($surveyId);
        return view('pages.survey.survey_responses.public_create', compact('survey'));
    }

    public function publicStore(Request $request, $surveyId)
    {
        $survey = Survey::with('questions')->findOrFail($surveyId);
        $anonId = session()->getId(); // identifikasi peserta anonim

        foreach ($survey->questions as $question) {
            SurveyResponse::create([
                'survey_id' => $surveyId,
                'question_id' => $question->id,
                'user_id' => auth()->id() ?? null,
                'anon_id' => auth()->check() ? null : $anonId,
                'jawaban' => $request->input('jawaban_'.$question->id),
            ]);
        }

        return redirect()->back()->with('success', 'Terima kasih sudah mengisi survey!');
    }
}
