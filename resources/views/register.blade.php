<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f4f8; }
        .container { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 400px; text-align: center; }
        h1 { color: #2d3748; }
        form { display: flex; flex-direction: column; gap: 1rem; }
        label { text-align: left; font-weight: bold; }
        input { padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 4px; }
        button { background: #4c51bf; color: white; padding: 0.75rem; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #3f44a3; }
        .alert { background: #d4edda; color: #155724; padding: 1rem; border-radius: 4px; margin-bottom: 1rem; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <label for="name">Nombre:</label>
            <input type="text" name="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="email">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
