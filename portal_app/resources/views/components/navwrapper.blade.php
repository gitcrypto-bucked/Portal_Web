
<div id="navbar-wrapper" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item d-sm-flex nav-logo">
                        <a class="nav-link d-sm-flex mt-2 " aria-current="page" ><img src="{{asset('assets/logo/logo.png')}}"  class="logo  d-sm-flex " width="137"></a>
                    </li>
                </ul>
                <form class="d-flex ml-4 d-none d-lg-flex">
                    <div class="dropdown  mx-2 px-2">
                        <button data-mdb-button-init
                                data-mdb-ripple-init data-mdb-dropdown-init class="btn "
                                type="button"
                                id="dropdownMenuButton"
                                data-mdb-toggle="dropdown"
                                aria-expanded="false"
                                    >
                            <i class="fa fa-bell" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton" >
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

            @if(Auth::check())
                <a class="btn  btn text-dark fw-bolder fs-6 px-5" type="submit" href="{{url('/logout')}}">Sair</a>
            @else
                <a class="btn  btn text-dark fw-bolder fs-6 px-5" type="submit" href="{{url('/login')}}">Login</a>
            @endif
    </form>

    </div>
    </nav>
    </div>
