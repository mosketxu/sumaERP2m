        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" id="main-nav">
            <div class="container">
                <a class="navbar-brand " href={{route('home')}}>
                    <img src="{{ asset('storage/img/logosuma.jpg')}}" height="30" class="d-inline-block" id="sumaLogo" alt="Suma Apoyo Empresarial">
                </a>
                <button class="navbar-toggler" 
                        type="button" 
                        data-toggle="collapse" 
                        data-target="#navbarCollapse" 
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        @section('menuservicios')
                            <li class="nav-item @yield('servicios')">
                                <a href="{{ route('home')}}" class="nav-link text-primary ">{{__("Servicios")}}</a>
                            </li>
                        @show
                        <li class="nav-item @yield('equipo')">
                            <a href="{{ route( 'suma.equipo')}}" class="nav-link text-primary ">{{__("Equipo")}}</a>
                        </li>
                        <li class="nav-item {{setActive('suma.clientes')}}">
                            <a href="{{ route( 'suma.clientes')}}" class="nav-link text-primary ">{{__("Clientes")}}</a>
                        </li>
                        <li class="nav-item {{setActive('suma.contacto')}}">
                            <a href="{{ route( 'suma.contacto')}}" class="nav-link text-primary ">{{__("Contacto")}}</a>
                        </li>

                        <li class="nav-item dropdown" >
                            <a href="#" class="nav-link text-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-globe-americas fa-lg mt-1"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('set_language', ['es']) }}">Es</a>
                                <a class="dropdown-item" href="{{ route('set_language', ['en']) }}">En</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login')}}" class="nav-link text-primary" aria-label="login"><i class="fas fa-user fa-lg mt-1" ></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
