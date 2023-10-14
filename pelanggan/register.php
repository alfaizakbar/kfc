<?php
// require '../database/konn.php';

// if( isset($_POST["submit"])){
//     if( registrasii($_POST) > 0){
//         echo "<script>
//         alert('user baru berhasil ditambahkan!');
//         document.location.href='pembayaran.php';
//         </script>";
//     }else{
//             echo "<script>
//             alert('Data gagal ditambahkan');
//             document.location.href='register.php';
//             </script>";
//         }
//     };




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register || KFC Lhokseumawe</title>
</head>
<body>
<form action="" method="post">
    <div class="container">
        <div class="bungkus">
            <h1>Register</h1>
            <div class="input">
                <label for="usernamee">Username</label>
                <input type="text" name="usernamee" id="usernamee" placeholder="username" require>
            </div>    
            <div class="putin">
                <label for="eml">Email</label>
                <input type="email" name="email" id="email" placeholder="email" require>
            </div>
            <div class="niput">
                <label for="psw">Password</label>
                <input type="text" name="password" id="password" placeholder="password" require>
            </div>
            <div class="niput">
                <label for="psw">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" require>
            </div>
            <div class="niput">
                <label for="psw">No HandPhone</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Nomor HandPhone" require>
            </div>
            <center>
                <input id="submit-btn" type="submit" name="submit" value="login">
            </center>    
        </div>
    </div>
    </form>
</body>
</html>