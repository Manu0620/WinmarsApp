<nav class="navbar navbar-expand-lg bg-light navbar fixed-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="/home"><img src="assets/img/LOGO WM PROPERTIE horizontal.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Registros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="registrarUsuarios">Usuarios</a></li>
                        <li><a class="dropdown-item" href="registrarClientes">Clientes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>

            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown"> 
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets\img\icon-5359553_1280.png" style="width: 45px" class="logo-usuario" alt="usuario">
                            {{auth()->user()->username}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @endauth
                
                <li class="nav-item">
                <a class="nav-link disabled"> </a>
                </li>
            </ul>

        </div>
    </div>
</nav>