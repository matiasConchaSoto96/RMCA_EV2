<x-app>
    <x-slot name="title">
        [TÍTULO]
    </x-slot>

    <x-slot name="body_class">
        hold-transition login-page
    </x-slot>

    <x-slot name="css">
        <style>
            .login-logo {
                font-size: 32px;
            }
        </style>
    </x-slot>

    <x-slot name="content">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('imgs/ip_ciisa.png') }}" alt="Logo" width="70%">
                <br>
                <b>IP</b>SS
            </div>
            <!-- /.login-logo -->
            <div class="card">
              <div class="card-body login-card-body">
                <p class="login-box-msg">Cree sus credenciales</p>
          
                <form action="{{ Route('usuario.registrar') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input name="nombre" type="text" class="form-control" placeholder="Ingresar Nombre">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="correo" type="email" class="form-control" placeholder="Ingresar Email">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Ingrese su Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="rePassword" type="password" class="form-control" placeholder="Ingrese Nuevamente su Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="dayCode" type="password" class="form-control" placeholder="Ingrese Código del Día">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recuérdame
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="row-8">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                        <br>
                        <div class="row-8">
                            <p>Si usted tiene una cuenta, entonces <a href="/login">inicie sesión</a> </p>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
              <!-- /.login-card-body -->
            </div>
          </div>
    </x-slot>
</x-app>
