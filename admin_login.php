<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Cricket Jersey Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0b132b, #1c2541);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            padding: 30px 40px;
            width: 340px;
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #00bcd4;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            background: #e0e0e0;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            background: #00bcd4;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #008ba3;
        }
        .note {
            margin-top: 15px;
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🧢 Admin Login</h2>
    <form action="admin_auth.php" method="POST">
        <input type="text" name="username" placeholder="यूज़रनेम" required>
        <input type="password" name="password" placeholder="पासवर्ड" required>
        <input type="submit" value="Login">
    </form>
    <div class="note">© Cricket Jersey Shop</div>
</div>

</body>
</html>
