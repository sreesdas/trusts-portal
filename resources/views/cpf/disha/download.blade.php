@extends('layouts.app')

@section('content')
    
    <div class="d-flex justify-content-between">
        <div style="flex:2"> <h4 class="text-primary mt-2"> {{ $agenda->file_no }} </h4> </div>
        {{-- <div> <a href="#" class="btn btn-outline-primary">View All</a></div> --}}
        <div> <a href="/cpf/disha/{{ $agenda->id }}/sortable" class="btn btn-success mx-1">Merge Selected Agendas</a></div>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th width="20%">Annexure</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($annexures as $key=>$annexure)
                <tr>
                    <td> {{ $annexure['DocumentTitle'] }}</td>
                    <td> {{ $annexure['PLO_SequenceNumber'] }}</td>
                    <td> {{ $annexure['Description'] }}</td>
                    <td> <a class="btn btn-sm btn-outline-primary" target="_blank" href="/cpf/disha/download/{{ $annexure['vsid'] }}"> View </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection