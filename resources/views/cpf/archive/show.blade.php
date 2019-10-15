@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.cpf')
@endsection

@section('heading')
    CPF PORTAL
@endsection

@section('content')

    <h4 class="my-2"> Search Results : {{ $agendas->count() }} </h4>

    <table class="table shadow-sm">
        <thead>
            <tr>
                <th>UID</th>
                <th>Subject</th>
                <th>Proposal</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agendas as $agenda)
                <tr>
                    <td> <a href="/cpf/agenda/{{ $agenda->id }}"> {{ $agenda->uid }} </a> </td>
                    <td> {{ $agenda->subject }} </td>
                    <td> {{ $agenda->proposal }} </td>
                    <td> {{ $agenda->date }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection