<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255,255,255,0.95);
            border-radius: 30px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .logo {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            color: white;
            font-size: 28px;
        }

        .title {
            text-align: center;
            font-weight: 700;
            margin-top: 15px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-login {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 12px;
            width: 100%;
            font-weight: 600;
        }

        .btn-login:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">
        <i class="bi bi-shield-lock-fill"></i>
    </div>

    <h3 class="title">Login Sistem</h3>
    <p class="subtitle">Admin & Guru</p>

    <?php if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger text-center">
            Username atau Password salah!
        </div>
    <?php } ?>

    <form action="proses_login.php" method="POST">

        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

        <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>

        <button class="btn btn-login">
            Login
        </button>

    </form>

</div>

</body>
</html>