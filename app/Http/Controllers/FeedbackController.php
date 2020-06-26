<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function  store(Request $request)
    {

        $Feedback = Feedback::create($request->all());
       
    }
    public function  view()
    {

        return Feedback::all();
       
    }
}
