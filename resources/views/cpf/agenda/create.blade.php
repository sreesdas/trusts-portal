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
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-primary">Create Cpf Agenda</h3>

            <form action="/cpf/agenda" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="uid">Unique ID</label>
                            <input type="text" name="uid" id="uid" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="date">Subject</label>
                            <textarea name="subject" id="subject" rows="3" class="form-control"></textarea>
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
                            <input id="presentation" type="file" name="presentation" class="custom-file-input">
                            <label for="presentation" class="custom-file-label">Upload Presentation</label>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection