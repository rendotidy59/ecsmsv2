<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contractor;
use App\Models\Questionaire;

class QuestionaireController extends Controller
{
    public function create()
    {
        return view('questionaire.create');
    }

    public function store(Request $request)
    {
        $contractorData = $request->validate([
            'name' => 'required|string',
            'registration_number' => 'nullable|string',
            'province' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'business_field' => 'nullable|string',
        ]);

        $contractor = Contractor::create($contractorData);

        $questionData = collect(range(1, 13))->flatMap(function ($i) use ($request) {
            $attachment = $request->file("question{$i}_attachment");
            return [
                "question{$i}_answer" => $request->input("question{$i}_answer"),
                "question{$i}_attachment" => $attachment ? $attachment->store('questionaire', 'public') : null,
            ];
        })->toArray();
        $questionData['contractor_id'] = $contractor->id;

        Questionaire::create($questionData);

        return redirect()->route('questionaire.create')->with('success', 'Data saved.');
    }
}
