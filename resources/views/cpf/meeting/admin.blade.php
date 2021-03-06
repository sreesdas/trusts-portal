@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.cpf')
@endsection

@section('heading')
    ECPF PORTAL - ADMIN
@endsection

@section('content')
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">CPF</a></li>
          <li class="breadcrumb-item"><a href="#">Meeting</a></li>
          <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
    </nav>

    <h3 class="mb-2 mt-4"> Meeting Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/cpf/meeting/{{ $meeting->id }}" method="post">
            @csrf 
            @method('PATCH')
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $meeting->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" value="{{ $meeting->date }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" id="time" value="{{ $meeting->time }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="members">Members</label>
                            {{-- <select multiple name="members[]" id="members" class="form-control">
                                @foreach (\App\User::all() as $user)
                                    <option {{ $meeting->users()->find($user->id) == null ? '' : 'selected' }} value="{{ $user->id }}"> {{ $user->name }} ( {{ $user->designation }} ) </option>
                                @endforeach
                            </select> --}}
                            <select multiple="multiple" id="members" name="members[]">
                                @foreach (\App\User::all() as $user)
                                    <option {{ $meeting->users()->find($user->id) == null ? '' : 'selected' }} value="{{ $user->id }}"> {{ $user->name }} ( {{ $user->designation }} ) </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Update</button>
                @if( $meeting->agendas->count() > 0 && $meeting->agendas->where('status', 'takenup')->count() == 0 )
                    <button type="button" id="btn-end-meeting" class="btn btn-danger" onclick="$('#form-end-meeting').submit()">End Meeting</button>
                @endif
            </form>
            <form id="form-end-meeting" action="/cpf/meeting/{{ $meeting->id }}" method="post">
            @csrf 
            @method('DELETE')
            </form>
        </div>
    </div>

    <h3 class="mb-2 mt-4"> Meeting Agendas</h3>

    <form action="/cpf/actions/{{ $meeting->id }}" method="post" class="mt-2">
    @csrf
        <table class="table table-striped shadow-sm">
            <thead>
                <tr>
                    <th> <input type="checkbox" id="checkbox-select-all"> </th>
                    <th> UID </th>
                    <th> Subject </th>
                    <th> Proposal </th>
                    <th> Date </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meeting->agendas->where('status', 'takenup') as $agenda)
                    <tr>
                        <td> <input type="checkbox" name="agendas[]" value="{{ $agenda->id }}" > </td>
                        <td> <a href="/cpf/agenda/{{ $agenda->id}}/edit" > {{ $agenda->uid }} </td>
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
        <button formaction="/cpf/action/{{ $meeting->id }}/deliberated" class="btn btn-outline-success">Deliberate</button>
        <button formaction="/cpf/action/{{ $meeting->id }}/withdrawn" class="btn btn-outline-danger">Withdraw</button>
        <button  formaction="/cpf/action/{{ $meeting->id }}/carried" class="btn btn-outline-primary">Carry Forward</button>
        <button  formaction="/cpf/action/{{ $meeting->id }}/circulate" class="btn btn-primary float-right">Circulate</button>
    </form>

@endsection