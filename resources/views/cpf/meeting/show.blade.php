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
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">CPF</a></li>
          <li class="breadcrumb-item"><a href="#">Meeting</a></li>
          <li class="breadcrumb-item active" aria-current="page">Archive</li>
        </ol>
    </nav>

    <h3 class="mb-2 mt-4"> Meeting Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input readonly type="text" value="{{ $meeting->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input readonly type="date" value="{{ $meeting->date }}" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        {{-- <label for="time">Time</label> --}}
                        <input readonly type="time" value="{{ $meeting->time }}" class="form-control">
                    </div>
                </div>

            </div>
            
            @if(Auth::user()->isAdmin('cpf'))
                <form action="/cpf/archive/{{ $meeting->id }}" method="post" class="form-inline" enctype="multipart/form-data">
                @csrf 
                @method('PATCH')
                    <div class="d-flex">
                        <div class="">
                            <input id="file" name="mom" type="file" class="custom-file-input" style="width:600px">
                            <label for="file" class="custom-file-label"> {{ $meeting->mom_url ?? 'Select MOM' }} </label>
                        </div>
                    
                        <button class="btn btn-primary ml-2">Upload</button>
                        <a href="/cpf/meeting/{{ $meeting->id }}/mom" class="btn btn-outline-primary ml-2">View</a>
                        <button type="button" class="btn btn-danger ml-2" onclick="$('.custom-file-label').text('Select MOM')">Remove</button>
                    </div>
                </form>
            @endif

        </div>
    </div>

    <h3 class="mb-2 mt-4"> Archived Agendas</h3>
    <table class="table table-striped shadow-sm">
        <thead>
            <tr>
                <th> <input type="checkbox" id="checkbox-select-all"> </th>
                <th> UID </th>
                <th> Subject </th>
                <th> Date </th>
                <th> Status </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meeting->agendas as $agenda)
                <tr>
                    <td> <input type="checkbox" name="agendas[]" value="{{ $agenda->id }}" > </td>
                    <td> <a href="/cpf/agenda/{{ $agenda->id }}" > {{ $agenda->uid }} </a> </td>
                    <td> 
                        <p class="mb-2" > {{ $agenda->subject }} </p>
                        @include('partials.cpf.attachment')
                    </td>
                    <td> {{ $agenda->date }} </td>
                    <td> {{ $agenda->status }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection