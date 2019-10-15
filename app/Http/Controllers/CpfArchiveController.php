<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use App\CpfMeeting;
use Illuminate\Http\Request;

class CpfArchiveController extends Controller
{

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
        return $request;
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
