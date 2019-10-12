@extends('layouts.app')

@section('sidebar')
    @if(Auth::user()->isAdmin('cpf'))
        @include('partials.sidebar.cpf')
    @else 
        @include('partials.sidebar.common')
    @endif
@endsection

@section('heading')
    CPF PORTAL
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

                {{-- FOR ADMIN --}}
                <div class="col-xl-6">
                    <div class="custom-file">
                        <input id="file" type="file" class="custom-file-input">
                        <label for="file" class="custom-file-label">Upload MOM</label>
                    </div>
                </div>
                <div class="col-xl-12">
                    <button class="btn btn-primary float-right">Upload</button>
                </div>

            </div>
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
                    <td> {{ $agenda->uid }} </td>
                    <td> {{ $agenda->subject }} </td>
                    <td> {{ $agenda->date }} </td>
                    <td> {{ $agenda->status }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection