@extends('layouts.app')

@section('sidebar')
    @if(Auth::user()->isAdmin('cpf'))
        @include('partials.sidebar.cpf')
    @else
        @include('partials.sidebar.common')
    @endif
@endsection

@section('heading')
    ECPF PORTAL
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
                    <td> 
                        <p class="mb-2" > {{ $agenda->subject }} </p>
                        @include('partials.cpf.attachment')
                    </td>
                    <td> {{ $agenda->proposal }} </td>
                    <td> {{ $agenda->date }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection