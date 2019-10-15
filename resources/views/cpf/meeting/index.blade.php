@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('heading')
    CPF PORTAL - MEMBER/TRUSTEE
@endsection

@section('content')

    <h3 class="mb-4 mt-2"> {{ $meeting->name }} </h3>
    <table class="table table-striped shadow-sm">
        <thead>
            <tr>
                <th> <input type="checkbox" id="checkbox-select-all"> </th>
                <th> UID </th>
                <th> Subject </th>
                <th> Proposal Type </th>
                <th> Date </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meeting->agendas->where('is_circulated', true) as $agenda)
                <tr>
                    <td> <input type="checkbox" name="agendas[]" value="{{ $agenda->id }}" > </td>
                    <td> <a href="/cpf/agenda/{{ $agenda->id }}"> {{ $agenda->uid }} </a> </td>
                    <td> {{ $agenda->subject }} </td>
                    <td> {{ $agenda->proposal }} </td>
                    <td> {{ $agenda->date }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection