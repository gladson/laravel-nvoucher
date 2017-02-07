<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlpanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function control_panel()
    {
        return view('voucher.control_panel');
    }
}
