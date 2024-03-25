<?php

namespace App\Http\Controllers;

use App\Models\interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {

        return view('interview.index');
    }

    public function edit(interview $interview)
    {
        return view('interview.index', ['editInterview' => $interview]);
    }
}
