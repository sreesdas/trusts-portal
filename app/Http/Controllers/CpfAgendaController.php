<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CpfAgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:cpf', ['except' => ['show'] ]);
    }

    public function index()
    {
        $agendas = CpfAgenda::where('status', 'carried')->orWhere('status', 'created')->get();
        return view('cpf.agenda.index', compact('agendas') );
    }

    public function create()
    {
        return view('cpf.agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uid' => 'required',
            'subject' => 'required',
            'date' => 'nullable',
            'proposal' => 'nullable'
        ]);

        try {
            $agenda = CpfAgenda::create($validated);
        } catch (QueryException $e ) {
            return redirect()->back()->with('error', 'UID already exists');
        }

        if( $request->hasFile('agenda') ){
            $agenda_name = "agenda_" . Carbon::now()->format('YmdHi') . "_" . $request->file('agenda')->getClientOriginalName();
            $agenda_path = $request->file('agenda')->storeAs("public/uploads/cpf/agenda/$agenda->id", $agenda_name);
            $agenda->agenda_url = explode( "/", $agenda_path, 2 )[1];
        }
        if( $request->hasFile('brief') ){
            $brief_name = "brief_" . Carbon::now()->format('YmdHi') . "_" . $request->file('brief')->getClientOriginalName();
            $brief_path = $request->file('brief')->storeAs("public/uploads/cpf/agenda/$agenda->id", $brief_name);
            $agenda->brief_url = explode( "/", $brief_path, 2 )[1];
        }
        if( $request->hasFile('notesheet') ){
            $notesheet_name = "notesheet_" . Carbon::now()->format('YmdHi') . "_" . $request->file('notesheet')->getClientOriginalName();
            $notesheet_path = $request->file('notesheet')->storeAs("public/uploads/cpf/agenda/$agenda->id", $notesheet_name);
            $agenda->notesheet_url = explode( "/", $notesheet_path, 2 )[1];
        }
        if( $request->hasFile('presentation') ){
            $presentation_name = "presentation_" . Carbon::now()->format('YmdHi') . "_" . $request->file('presentation')->getClientOriginalName();
            $presentation_path = $request->file('presentation')->storeAs("public/uploads/cpf/agenda/$agenda->id", $presentation_name);
            $agenda->presentation_url = explode( "/", $presentation_path, 2 )[1];
        }
        $agenda->save();

        return redirect('/cpf/agenda/create')->with('success', "Agenda $agenda->uid created");
    }

    public function show(CpfAgenda $agenda)
    {
        return view('cpf.agenda.show', compact('agenda'));
    }

    public function edit(CpfAgenda $agenda)
    {
        return view('cpf.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, CpfAgenda $agenda)
    {
        $request->validate([
            'uid' => 'required',
            'subject' => 'required'
        ]);

        $agenda->uid = $request->uid;
        $agenda->subject = $request->subject;
        $agenda->proposal = $request->proposal;
        $agenda->date = $request->date;

        if( $request->hasFile('agenda') ){
            $agenda_name = "agenda_" . Carbon::now()->format('YmdHi') . "_" . $request->file('agenda')->getClientOriginalName();
            $agenda_path = $request->file('agenda')->storeAs("public/uploads/cpf/agenda/$agenda->id", $agenda_name);
            $agenda->agenda_url = explode( "/", $agenda_path, 2 )[1];
        }
        if( $request->hasFile('brief') ){
            $brief_name = "brief_" . Carbon::now()->format('YmdHi') . "_" . $request->file('brief')->getClientOriginalName();
            $brief_path = $request->file('brief')->storeAs("public/uploads/cpf/agenda/$agenda->id", $brief_name);
            $agenda->brief_url = explode( "/", $brief_path, 2 )[1];
        }
        if( $request->hasFile('notesheet') ){
            $notesheet_name = "notesheet_" . Carbon::now()->format('YmdHi') . "_" . $request->file('notesheet')->getClientOriginalName();
            $notesheet_path = $request->file('notesheet')->storeAs("public/uploads/cpf/agenda/$agenda->id", $notesheet_name);
            $agenda->notesheet_url = explode( "/", $notesheet_path, 2 )[1];
        }
        if( $request->hasFile('presentation') ){
            $presentation_name = "presentation_" . Carbon::now()->format('YmdHi') . "_" . $request->file('presentation')->getClientOriginalName();
            $presentation_path = $request->file('presentation')->storeAs("public/uploads/cpf/agenda/$agenda->id", $presentation_name);
            $agenda->presentation_url = explode( "/", $presentation_path, 2 )[1];
        }

        $agenda->save();

        return redirect()->back()->with("success", "Agenda $agenda->uid succesfully updated");
        
    }

    public function destroy(CpfAgenda $agenda)
    {
        $agenda->delete();

        return redirect('/cpf/agenda')->with("success", "$agenda->uid succesfully deleted" ); 
    }
}
