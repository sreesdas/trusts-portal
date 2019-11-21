<aside class="col-12 col-md-2 p-0 bg-dark" {{ Auth::user()->isAdminOfAny() ? '' : 'style=display:none' }} >
    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2 px-0">
        <div class="collapse navbar-collapse w-100">
            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                <li class="nav-item">
                    <a class="nav-link pl-2 text-nowrap" href="/home">
                        <i data-feather="home"></i> <span class="font-weight-bold ml-2">HOME</span>
                    </a>
                </li>
                @if(in_array( explode('/', \Route::getCurrentRoute()->uri)[0], ['cpf', 'csss' ]))
                    <li class="nav-item">
                        <a class="nav-link pl-2" href="{{ "/" . explode( '/', \Route::getCurrentRoute()->uri )[0] . "/archive" }} ">
                            <i data-feather="archive"></i> <span class="d-none d-md-inline ml-2">ARCHIVES</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link pl-2" href="/user">
                        <i data-feather="users"></i> <span class="d-none d-md-inline ml-2">USERS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-2" href="#" onclick="$('#form-logout').submit()">
                        <i data-feather="log-out"></i> <span class="d-none d-md-inline ml-2">LOGOUT</span>
                    </a>
                </li>
                <form id="form-logout" action="/logout" method="post">
                @csrf
                </form>
            </ul>
        </div>
    </nav>
</aside>