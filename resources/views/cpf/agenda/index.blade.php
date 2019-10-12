@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.cpf')
@endsection

@section('heading')
    CPF PORTAL - ADMIN
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">CPF</a></li>
          <li class="breadcrumb-item"><a href="#">Agenda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pending</li>
        </ol>
    </nav>
    <form action="/cpf/meeting" method="post">
    @csrf
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
                @foreach ($agendas as $agenda)
                    <tr>
                        <td> <input type="checkbox" name="agendas[]" value="{{ $agenda->id }}" > </td>
                        <td> <a href="/cpf/agenda/{{ $agenda->id }}"> {{ $agenda->uid }} </a> </td>
                        <td> {{ $agenda->subject }} </td>
                        <td> {{ $agenda->date }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-success">Add to Meeting</button>
        <a href="/cpf/agenda/create" class="btn btn-primary float-right">Create Agenda</a>
    </form>

@endsection