
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
<body>
    <div class="container">

        <form action="../database/ceklogin.php" method="post">
        <div class="bungkus">

                <h1>Login</h1>
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="name" placeholder="username" required>
                </div>      
                <div class="niput">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="password" required>
                </div>
                <center>
                    <input id="submit-btn" type="submit" name="tambah" value="Login">
                    <a href="register.php" id="sign-up">Belum Punya akun?</a>
                </center>    
            </form>
            </div>
        </div>
    
</body>
</html>