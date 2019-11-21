@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-2">
            <a href="{{ Auth::user()->isAdmin('cpf') ? '/cpf/agenda' : '/cpf/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> ECPF TRUST </h3> 
                        @if($cpf)
                            <p class="text-danger" style="font-size:1rem" >{{ $cpf->name }} scheduled to be held on {{ $cpf->date }}, {{ $cpf->time }} </p>
                        @else
                            <p class="text-danger" style="font-size:1rem"> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 my-2">
            <a href="{{ Auth::user()->isAdmin('csss') ? '/csss/agenda' : '/csss/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> PRBS TRUST </h3> 
                        @if($csss)
                            <p class="text-danger" style="font-size:1rem">{{ $csss->name }} scheduled to be held on {{ $csss->date }}, {{ $csss->time }} </p>
                        @else
                            <p class="text-danger" style="font-size:1rem"> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 my-2">
            <a href="{{ Auth::user()->isAdmin('csss') ? '/csss/agenda' : '/csss/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> SAHAYOG TRUST </h3> 
                        @if($csss)
                            <p class="text-danger" style="font-size:1rem">{{ $csss->name }} scheduled to be held on {{ $csss->date }}, {{ $csss->time }} </p>
                        @else
                            <p class="text-danger" style="font-size:1rem"> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 my-2">
            <a href="{{ Auth::user()->isAdmin('csss') ? '/csss/agenda' : '/csss/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> CSSS TRUST </h3> 
                        @if($csss)
                            <p class="text-danger" style="font-size:1rem">{{ $csss->name }} scheduled to be held on {{ $csss->date }}, {{ $csss->time }} </p>
                        @else
                            <p class="text-danger" style="font-size:1rem"> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 my-2">
            <a href="{{ Auth::user()->isAdmin('csss') ? '/csss/agenda' : '/csss/meeting' }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h3> GRATUITY FUND TRUST </h3> 
                        @if($csss)
                            <p class="text-danger" style="font-size:1rem">{{ $csss->name }} scheduled to be held on {{ $csss->date }}, {{ $csss->time }} </p>
                        @else
                            <p class="text-danger" style="font-size:1rem"> No meeting scheduled</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 my-2">
            <div id="calendar"></div>
        </div>

    </div>
</div>
@endsection
