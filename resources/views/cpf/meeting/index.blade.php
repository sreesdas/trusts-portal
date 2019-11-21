@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('heading')
    ECPF PORTAL - MEMBER/TRUSTEE
@endsection

@section('content')

    <div class="d-flex justify-content-start">
        <div>
            <img src="/img/ongc.png" width="100px" alt="ongc">
        </div>
        <div style="margin-left:6rem">
            <h3 class="mb-2 mt-2 text-center"> OIL AND NATURAL GAS CORPORATION LIMITED </h3>
            <h3 class="text-center"> EMPLOYEES CONTRIBUTORY PROVIDENT FUND TRUST </h3>
            <p class="text-center" style="font-size:1.2rem" > {{ $meeting->name }}</p>
        </div>
    </div>

    <p style="font-size:1rem" > Agenda points for the {{ $meeting->name }} <span class="float-right"> {{ $meeting->date }}, {{ $meeting->time }}  </span> </p>
    <table class="table table-striped shadow-sm">
        <thead>
            <tr>
                {{-- <th> <input type="checkbox" id="checkbox-select-all"> </th> --}}
                <th> Agenda ID </th>
                <th> Subject </th>
                <th> Proposal Type </th>
                <th> Intimation Date </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meeting->agendas->where('is_circulated', true) as $agenda)
                <tr>
                    {{-- <td> <input type="checkbox" name="agendas[]" value="{{ $agenda->id }}" > </td> --}}
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