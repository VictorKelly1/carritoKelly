<div meta-title="Log in" meta-description="Log in">
    <h1>Bienvenido</h1>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .login-container a {
            display: block;
            text-align: center;
            margin: 15px 0;
            text-decoration: none;
            color: #007bff;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }
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

                <a href="{{ route('usuario.registrarVista') }}">No tienes cuenta? Registrarme</a>
                <button type="submit">Iniciar Sesión</button>
            </form>

            @session('error')
                {{ $value }}
            @endsession

        </div>

</div>
