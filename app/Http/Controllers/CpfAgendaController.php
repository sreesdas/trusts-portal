<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
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
