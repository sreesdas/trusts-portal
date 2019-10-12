@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('heading')
    CPF PORTAL - ADMIN
@endsection

@section('content')

    <h3 class="mb-4 mt-2"> {{ $meeting->name }} </h3>
    <table class="table table-striped shadow-sm">
        <thead>
            <tr>
                <th> <input type="checkbox" id="checkbox-select-all"> </th>
                <th> UID </th>
                <th> Subject </th>
                <th> Date </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meeting->agendas as $agenda)
                <tr>
                    <td> <input type="checkbox" name="agendas[]" value="{{ $agenda->id }}" > </td>
                    <td> {{ $agenda->uid }} </td>
                    <td> {{ $agenda->subject }} </td>
                    <td> {{ $agenda->date }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection