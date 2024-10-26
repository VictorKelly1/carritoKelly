<div meta-title="Log in" meta-description="Log in">
    <h1>Bien venido</h1>

    </style>
    </head>

    <body>

        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            {{-- @foreach ($datos as $dato)
                {{ $dato->correo }}
                <br />
            @endforeach --}}
            <form action="{{ route('usuario.autenticar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="contraseña" required>
                </div>
                <a href="{{ route('usuario.registrarVista') }}">Registrarse</a>
                <button type="submit">Iniciar Sesión</button>
            </form>

            @session('error')
                {{ $value }}
            @endsession

        </div>

</div>
