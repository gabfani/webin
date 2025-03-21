<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logobtn.png">
    <title>Inventory Barang - Login</title>
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /*background-color: #3D3BF3; // rgba(49, 47, 158, 0.76)*/
            background: url('images/background.png') no-repeat center center/cover;

            
        }
        .login-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        .login-box h1 {
            margin-bottom: 20px;
        }
        .login-box button {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="images/logo.png" alt="Logo" width="200" style="margin-bottom: 30px; margin-top: 30px;">
        <h1>Selamat Datang</h1>
        <form action="pro_login.php" method="post">
            <div class="form-group">
                <input type="text" name="user" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
    </div>
</body>
</html>
