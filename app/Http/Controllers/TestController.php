<?php

namespace App\Http\Controllers;

use App\Models\Contractor;

class TestController extends Controller
{
    public function index()
    {
        // Ambil semua contractor beserta questionnaire & assessment-nya
        $contractors = Contractor::with(['questionaires.assessment.assessor'])->get();

        return view('test.index', compact('contractors'));
    }
}
