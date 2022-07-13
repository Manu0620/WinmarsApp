<style>

    nav a:active, nav a:link,nav a:visited{
        text-decoration: none;
        color: black;
    }

    nav{
        background-color: rgb(224, 224, 224);
    }

    .nav-item{
        padding: 3px; 
        font-weight: 700;
        font-size: 16px;
    }

    .dropdown-menu{
        padding: 10px;
        font-size: 16px;
        text-align: left;
        border: 1px solid transparent;
        border-radius: 10px;
        box-shadow: 0px 5px 10px #6c757d84;
    }

    .dropdown-item{
        position: relative;
        padding: 10px 120px 10px 15px;
        
    }

    .dropdown-item:hover{
        background-color: #1976d2;
        color: #fff;
        border-radius: 10px;
    }

    .dropdown-item i{
        position: absolute;
        right: 10px;
        top: 15px;
    }
</style>

<nav class="navbar navbar-expand-lg bg-light navbar fixed-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="/home"><img src="assets/img/LOGO WM PROPERTIE horizontal.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-database"></i> Registros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="registrarUsuarios"><i class="fa-solid fa-user" style="position: initial;"></i>  Usuarios<i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a class="dropdown-item" href="registrarEmpleados"><i class="fa-solid fa-user" style="position: initial;"></i>  Empleados<i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a class="dropdown-item" href="registrarClientes"><i class="fa-solid fa-user-check" style="position: initial;"></i>  Clientes<i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a class="dropdown-item" href="registrarPropiedades"><i class="fa-solid fa-building" style="position: initial;"></i>  Propiedades <i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a class="dropdown-item" href="registrarCitas"><i class="fa-solid fa-calendar-check" style="position: initial;"></i>  Citas <i class="fa-solid fa-arrow-right"></i></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-gears"></i> Procesos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-file-invoice-dollar" style="position: initial;"></i>  Facturas<i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-money-check-dollar" style="position: initial;"></i>  Cobros<i class="fa-solid fa-arrow-right"></i></a></li>
                    </ul>
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
                            <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>