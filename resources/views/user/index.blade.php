@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('heading')
    ONGC WELFARE TRUSTS PORTAL
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">All</li>
        </ol>
    </nav>
    
    <table class="table shadow-sm">
        <thead>
            <tr>
                <th>CPF</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>TRUSTS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> <a href="/user/{{ $user->id }}"> {{ $user->cpf }} </a> </td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td>
                        @if($user->roles)
                            <ul>
                                @foreach ($user->roles as $role)
                                    <li> {{ $role }} </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if( Auth::user()->isAdminOfAny() )
        <a href="/user/create" class="btn btn-primary">Create User</a>
    @endif

@endsection