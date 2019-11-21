<?php

namespace App\Http\Controllers;

use App\CpfAgenda;
use Illuminate\Http\Request;

class WebviewerController extends Controller
{
    public function index(Request $request)
    {
        $portal = $request->input('portal');
        $id = $request->input('id');
        $document = $request->input('document');

        switch ($portal) {
            case 'cpf':
                $agenda = CpfAgenda::findOrFail($id);
                $document = $document . '_url';
                $url = "/storage/" . $agenda->$document;
                break;
            default:
                abort(404);
                break;
        }

        return view('webviewer.index', compact('url'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
