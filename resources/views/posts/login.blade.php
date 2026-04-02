<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-image: url('{{ asset('pic/birmingham-museums-trust-HEEvYhNzpEo-unsplash.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        /* Glass + hover animation */
        .glass-card {
            background-color: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            transition: transform 0.8s ease, box-shadow 0.8s ease;
        }

        .glass-card:hover {
            transform: scale(1.1);
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card glass-card border-0 shadow-lg" style="width: 380px;">
    <div class="card-body p-4">

        <h3 class="text-center fw-bold mb-4">LOGIN</h3>

        <form method="POST" action="{{ route('posts.login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control" name="password" required>
                </div>
            </div>

            <!-- Button -->
             
            <button class="btn btn-primary w-100 mb-3">
                Login
            </button>
            
            
        </form>

        <p class="text-center mb-0">
            Don’t have an account?
            <a href="{{route('posts.register')}}" class="fw-semibold">Register</a>
        </p>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
