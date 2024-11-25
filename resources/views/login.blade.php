<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold text-center mb-6">Login</h1>
        <form method="POST" action="{{ url('/login/akun/web/greatmale') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="name" name="name" 
                       class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" 
                       class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       required>
            </div>
            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif
            <button type="submit" 
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Login
            </button>
        </form>
    </div>
</body>
</html>
