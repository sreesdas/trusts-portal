@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.cpf')
@endsection

@section('heading')
    CPF PORTAL
@endsection

@section('content')

    <div class="d-flex justify-content-end">
        <div>
            <form action="/cpf/archive" method="post" class="form-inline">
            @csrf
                <input name="search" type="text" class="form-control" style="width:300px" placeholder="Search by agenda id or subject">
                <button class="btn btn-primary ml-2">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            @foreach ($meetings as $meeting)
                <div class="card">
                    <a href="/cpf/meeting/{{ $meeting->id }}" class="card-link">
                        <div class="card-body">
                            <h3 class="card-title"> {{ $meeting->name }} </h3>
                            <p> {{ $meeting->date }} </p>
                        </div>
                    </a>
                    <div class="card-footer">
                        {{ $meeting->status }}

                        @if( $meeting->mom_url )
                            <a href="#" class="float-right">VIEW MOM</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection