<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab12 | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-5" style="width: 100%; max-width: 800px;">
            <h1 class="mb-4 text-center">Login</h1>

            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Login
                    </button>
                    <a href="/register" class="btn btn-secondary">
                        <i class="bi bi-arrow-right"></i> Register
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>