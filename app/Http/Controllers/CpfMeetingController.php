<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use App\CpfMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CpfMeetingController extends Controller
{

    public $meeting;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:cpf', ['except' => ['index', 'show', 'mom'] ]);
        $this->meeting = CpfMeeting::with('agendas')->where('status', 'scheduled')->get()->last();
    }

    public function index()
    {
        if(!$this->meeting) abort(500, 'ECPF meeting doesn\'t exist');

        if( $this->meeting->users()->find(Auth::user()->id) == null ) {
            return redirect('/home')->with("error", "You are not authorized to view this meeting");
        }

        return view('cpf.meeting.index')->with([
            'meeting' => $this->meeting 
        ]);
    }

    public function admin() {

        if(!$this->meeting) abort(500, 'ECPF meeting doesn\'t exist');

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
            'name' => 'required',
            'members' => 'required'
        ]);

        $meeting->name = $request->name;
        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->save();

        $meeting->users()->sync($request->members);

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

        if( !in_array($action, [ 'deliberated', 'withdrawn', 'carried', 'circulate' ])) {
            return redirect('/cpf/meeting/admin')->with('error', 'Invalid action');
        }

        $agendas = CpfAgenda::find($request->agendas);
        
        if($action == 'circulate') {
            foreach ($agendas as $agenda) {
                $agenda->is_circulated = true;
            }
            $agenda->save();
        } else {
            foreach ($agendas as $agenda) {
                $agenda->status = $action;
            }
            $agenda->save();
        }

        $this->meeting->agendas()->syncWithoutDetaching($request->agendas, ['status' => $action] );
        return redirect('/cpf/meeting/admin')->with('success', count($request->agendas) . " agendas has been $action" );
    }

    public function mom(CpfMeeting $meeting) {
        
        if($meeting->mom_url) {
            return view('webviewer.index')->with([
                'url' => "/storage/" . $meeting->mom_url
            ]);
        } else {
            abort(404, 'MOM Not found');
        }
    }
}
