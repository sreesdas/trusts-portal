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

    <div class="d-flex justify-content-end mb-4">
        <div>
            <form action="/cpf/archive" method="post" class="form-inline">
            @csrf
                <input name="search" type="text" class="form-control" style="width:300px" placeholder="Search by agenda id or subject">
                <button class="btn btn-primary ml-2">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($meetings as $meeting)
            <div class="col-xl-4">
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
                            <a href="/cpf/meeting/{{ $meeting->id }}/mom" target="_blank" class="float-right">VIEW MOM</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection