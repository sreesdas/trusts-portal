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
    
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-primary">{{ $user->name }}</h3>
            <form action="/user/{{ $user->id }}" method="post">
            @method('PATCH')
            @csrf 
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" class="form-control" value="{{ $user->designation }}">
                        </div>
                    </div>
                    @if( Auth::user()->isAdmin('cpf') )
                        <div class="col-xl-12">
                            <div class="form-group form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="cpftrust" value="cpf" name="trusts[]" @if($user->isTrustee('cpf')) checked @endif>
                                <label class="form-check-label" for="cpftrust">CPF Trustee</label>
                            </div>
                            <div class="form-group form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="cpfadmin" value="cpf" name="adminroles[]" @if($user->isAdmin('cpf')) checked @endif>
                                <label class="form-check-label" for="cpfadmin">CPF Admin</label>
                            </div>
                        </div>
                    @endif
                    @if( Auth::user()->isAdmin('csss') )
                        <div class="col-xl-12">
                            <div class="form-group form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="cssstrust" value="csss" name="trusts[]" @if($user->isTrustee('csss')) checked @endif>
                                <label class="form-check-label" for="cssstrust">CSSS Trustee</label>
                            </div>
                            <div class="form-group form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="csssadmin" value="csss" name="adminroles[]" @if($user->isAdmin('csss')) checked @endif>
                                <label class="form-check-label" for="csssadmin">CSSS Admin</label>
                            </div>
                        </div>
                    @endif
                    <div class="col-xl-12">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection