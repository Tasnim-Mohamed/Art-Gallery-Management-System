<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-image: url('{{ asset('pic/The-Family-Homestead.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        

        .glass-card {
            background-color: rgba(243, 248, 247, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .glass-card:hover {
            transform: scale(1.1);
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card glass-card border-0 shadow-lg" style="width: 420px;">
    <div class="card-body p-4">

        <h3 class="text-center fw-bold mb-4">REGISTER</h3>

        <form method="POST" action="{{route('posts.register')}}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>

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

            <!-- Role -->
            <div class="mb-3 d-flex align-items-center gap-4">
  <label class="form-label fw-bold mb-0">Role</label>
  
  <div class="form-check">
    <input class="form-check-input" type="radio" name="role" id="roleUser" value="user" checked>
    <label class="form-check-label" for="roleUser">User</label>
</div>

<div class="form-check">
    <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin">
    <label class="form-check-label" for="roleAdmin">Admin</label>
</div>

</div>




            <!-- Button -->
            <button class="btn btn-success w-100 mb-3">
                Register
            </button>
        </form>

        <p class="text-center mb-0">
            Already have an account?
            <a href="{{ route('posts.login') }}" class="fw-semibold">Login</a>
        </p>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
