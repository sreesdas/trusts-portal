@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ Auth::user()->isAdmin('cpf') ? '/cpf/agenda' : '/cpf/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> ECPF TRUST </h3> 
                        @if($cpf)
                            <p>{{ $cpf->name }} scheduled to be held on {{ $cpf->date }}, {{ $cpf->time }} </p>
                        @else
                            <p> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ Auth::user()->isAdmin('csss') ? '/csss/agenda' : '/csss/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> CSSS TRUST </h3> 
                        @if($csss)
                            <p>{{ $csss->name }} scheduled to be held on {{ $csss->date }}, {{ $csss->time }} </p>
                        @else
                            <p> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
