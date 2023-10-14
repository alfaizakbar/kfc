<?php
$conn = mysqli_connect('localhost','root','','company_profile');
function tambahhh($dataa){
    global $conn;
    $id = $dataa['id_pelanggan'];
    $username = $dataa['usernamee'];
    $email = $dataa['email'];
    $password = $dataa['password'];

    $mysql = "INSERT INTO pelanggan VALUES ('', '$username', '$email', '$password')";    
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
    };
    

?>