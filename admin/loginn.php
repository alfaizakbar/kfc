<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
   <h1>Halaman Login</h1>
   <form action="proses_login.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="admin_username"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="admin_password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>

</body>
</html>