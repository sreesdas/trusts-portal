<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CpfAgendaController extends Controller
{

    public function __construct()
    {
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
        ]);

        $agenda = CpfAgenda::create($validated);

        if( $request->hasFile('agenda') ){
            $agenda_name = "agenda_" . Carbon::now()->format('YmdHi') . "_" . $request->file('agenda')->getClientOriginalName();
            $agenda_path = $request->file('agenda')->storeAs("public/uploads/cpf/agenda/$agenda->id", $agenda_name);
            $agenda->agenda_url = explode( "/", $agenda_path, 2 )[1];
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
        return $agenda;
    }

    public function edit(CpfAgenda $agenda)
    {
        //
    }

    public function update(Request $request, CpfAgenda $agenda)
    {
        //
    }

    public function destroy(CpfAgenda $agenda)
    {
        //
    }
}
