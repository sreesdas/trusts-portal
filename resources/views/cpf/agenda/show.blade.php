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
          <li class="breadcrumb-item"><a href="#">Agenda</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-primary">{{ $agenda->subject }}</h3>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="uid">Unique ID</label>
                            <input readonly type="text" name="uid" id="uid" value={{ $agenda->uid }} class="form-control" placeholder="Eg 100.1">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="date">Intimation Date</label>
                            <input readonly type="date" name="date" id="date" value={{ $agenda->date }} class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="proposal">Proposal Type</label>
                            <select readonly name="proposal" id="proposal" class="form-control">
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
                            <input readonly readonly type="text" id="status" value={{ $agenda->status }} class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="date">Subject</label>
                            <textarea readonly name="subject" id="subject" rows="3" class="form-control"> {{ $agenda->subject }} </textarea>
                        </div>
                    </div>
                </div>

                @if(Auth::user()->isAdmin('cpf') && $agenda->isEditable())
                    <a href="/cpf/agenda/{{ $agenda->id }}/edit" class="btn btn-primary">Edit</a>
                @endif
        </div>
    </div>

@endsection