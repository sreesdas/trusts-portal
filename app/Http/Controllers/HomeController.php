<?php

namespace App\Http\Controllers;

use App\CpfMeeting;
use App\CsssMeeting;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $cpf = CpfMeeting::where('status', 'scheduled')->get()->last();
        $csss = CsssMeeting::where('status', 'scheduled')->get()->last();

        return view('home', compact('cpf', 'csss'));
    }
}
