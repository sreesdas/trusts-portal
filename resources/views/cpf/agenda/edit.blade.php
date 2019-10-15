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
          <li class="breadcrumb-item"><a href="#">Agenda</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-primary">Edit Agenda</h3>

            <form action="/cpf/agenda/{{ $agenda->id }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="uid">Unique ID</label>
                            <input type="text" name="uid" id="uid" value={{ $agenda->uid }} class="form-control" placeholder="Eg 100.1">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="date">Intimation Date</label>
                            <input type="date" name="date" id="date" value={{ $agenda->date }} class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="proposal">Proposal Type</label>
                            <select name="proposal" id="proposal" class="form-control">
                                <option value="confirmation" @if( $agenda->proposal == 'confirmation' ) selected @endif >Confirmation</option>
                                <option value="information and further direction" @if( $agenda->proposal == 'information and further direction' ) selected @endif>Information and further direction</option>
                                <option value="approval" @if( $agenda->proposal == 'approval' ) selected @endif >Approval</option>
                                <option value="ratification/appraisal" @if( $agenda->proposal == 'ratification/appraisal' ) selected @endif>Ratification/appraisal</option>
                                <option value="others" @if( $agenda->proposal == 'others' ) selected @endif>Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input readonly type="text" id="status" value={{ $agenda->status }} class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="date">Subject</label>
                            <textarea name="subject" id="subject" rows="3" class="form-control"> {{ $agenda->subject }} </textarea>
                        </div>
                    </div>
                    <div class="col-xl-6 form-group">
                        <div class="custom-file">
                            <input id="agenda" type="file" name="agenda" class="custom-file-input">
                            <label for="agenda" class="custom-file-label">Upload Agenda</label>
                        </div>
                    </div>
                    <div class="col-xl-6 form-group">
                        <div class="custom-file">
                            <input id="brief" type="file" name="brief" class="custom-file-input">
                            <label for="brief" class="custom-file-label">Upload Brief</label>
                        </div>
                    </div>
                    <div class="col-xl-6 form-group">
                        <div class="custom-file">
                            <input id="notesheet" type="file" name="notesheet" class="custom-file-input">
                            <label for="notesheet" class="custom-file-label">Upload Notesheet</label>
                        </div>
                    </div>
                    <div class="col-xl-6 form-group">
                        <div class="custom-file">
                            <input id="presentation" type="file" name="presentation" class="custom-file-input">
                            <label for="presentation" class="custom-file-label">Upload Presentation</label>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        @if( $agenda->status == 'takenup' || $agenda->status == 'created' )
                            <button class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-danger" onclick="$('#form-agenda-delete').submit()">Delete</button>
                        @endif
                    </div>
                </div>
            </form>
            @if( $agenda->status == 'takenup' || $agenda->status == 'created' )
                <form id="form-agenda-delete" action="/cpf/agenda/{{ $agenda->id }}" method="post">
                @csrf 
                @method('DELETE')
                </form>
            @endif
        </div>
    </div>

@endsection