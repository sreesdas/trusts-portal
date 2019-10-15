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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
