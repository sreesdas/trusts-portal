<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use App\CpfMeeting;
use Illuminate\Http\Request;

class CpfMeetingController extends Controller
{

    public $meeting;

    public function __construct()
    {
        $this->meeting = CpfMeeting::with('agendas')->where('status', 'scheduled')->get()->last();
    }

    public function index()
    {
        if(!$this->meeting) abort(500, 'Cpf meeting doesn\'t exist');

        return view('cpf.meeting.index')->with([
            'meeting' => $this->meeting 
        ]);
    }

    public function admin() {

        if(!$this->meeting) abort(500, 'Cpf meeting doesn\'t exist');

        return view('cpf.meeting.admin')->with([
            'meeting' => $this->meeting
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'agendas' => 'required'
        ]);

        $agendas = CpfAgenda::find($request->agendas);
        foreach ($agendas as $agenda) {
            $agenda->status = 'takenup';
            $agenda->save();
        }

        $this->meeting->agendas()->attach($request->agendas, ['status' => 'takenup'] );

        return redirect('/cpf/meeting/admin')->with('success', 'Agendas added to meeting!');
    }

    public function show(CpfMeeting $meeting)
    {
        return view('cpf.meeting.show', compact('meeting'));
    }

    public function edit(CpfMeeting $meeting)
    {
        //
    }

    public function update(Request $request, CpfMeeting $meeting)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $meeting->name = $request->name;
        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->save();

        return redirect('/cpf/meeting/admin')->with('success', "$meeting->name updated");

    }

    public function destroy(CpfMeeting $meeting)
    {
        $meeting->status = 'over';
        $meeting->save();

        CpfMeeting::create([
            'name' => ''
        ]);

        return redirect('/cpf/meeting/admin')->with('success', "$meeting->name ended.");
    }

    public function action(Request $request, $id, $action) {
        
        $request->validate([
            'agendas' => 'required'
        ]);

        if( !in_array($action, [ 'deliberated', 'withdrawn', 'carried' ])) {
            return redirect('/cpf/meeting/admin')->with('error', 'Invalid action');
        }

        $agendas = CpfAgenda::find($request->agendas);
        foreach ($agendas as $agenda) {
            $agenda->status = $action;
            $agenda->save();
        }

        $this->meeting->agendas()->syncWithoutDetaching($request->agendas, ['status' => $action] );
        return redirect('/cpf/meeting/admin')->with('success', count($request->agendas) . " agendas $action" );
    }
}
