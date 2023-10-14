<?php
$conn = mysqli_connect('localhost','root','','company_profile');
function tambahh($data){
    global $conn;
    $id = $data['id'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    $mysql = "INSERT INTO user VALUES ('', '$username', '$email', '$password')";    
    mysqli_query($conn, $mysql);
    return mysqli_affected_rows($conn);
    };
    

?>