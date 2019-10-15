@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar.common')
@endsection

@section('heading')
    TRUSTS PORTAL
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user">Users</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
    
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-primary">Create User</h3>

            <form action="/user" method="post">
            @csrf 

                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="password">Default Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection