<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use Carbon\Carbon;
use App\CpfMeeting;
use Illuminate\Http\Request;

class CpfArchiveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $meetings = CpfMeeting::paginate(9);

        return view('cpf.archive.index', compact('meetings') );
    }

    public function create()
    {
    }

    // Search Functionality
    public function store(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $agendas = CpfAgenda::where('subject', 'like', "%$request->search%" )->orWhere('uid', $request->search )->get();
        
        return view('cpf.archive.show', compact('agendas'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    // UPDATE MOM
    public function update(Request $request, $id)
    {
        $request->validate([
            'mom' => 'required'
        ]);

        $meeting = CpfMeeting::findOrFail($id);
        
        if( $request->hasFile('mom') ){
            $mom_name = "mom_" . Carbon::now()->format('YmdHi') . "_" . $request->file('mom')->getClientOriginalName();
            $mom_path = $request->file('mom')->storeAs("public/uploads/cpf/mom/$meeting->id", $mom_name);
            $meeting->mom_url = explode( "/", $mom_path, 2 )[1];
        }

        $meeting->save();
        return redirect()->back()->with('success', 'mom uploaded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
