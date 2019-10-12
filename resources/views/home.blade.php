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
                        CPF TRUST
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ Auth::user()->isAdmin('csss') ? '/csss/agenda' : '/csss/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        CSSS TRUST
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
