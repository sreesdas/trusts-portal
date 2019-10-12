@extends('layouts.app')

@section('heading')
    TRUSTS PORTAL
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
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
                        <ul>
                            @foreach ($user->trusts as $trust)
                                <li> {{ $trust }} {{ $user->isAdmin($trust) ? '(admin)' : '' }} </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection