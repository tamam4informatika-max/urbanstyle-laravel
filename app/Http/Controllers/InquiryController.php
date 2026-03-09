<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{

    public function store(Request $request)
    {

        Inquiry::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'message' => $request->message
        ]);

        return redirect('/catalog')->with('success','Inquiry sent successfully');

    }

}