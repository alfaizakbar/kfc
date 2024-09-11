
<?php
session_start();
include 'koneksi.php';
// Fetch user data for the logged-in user
$admin_id = $_SESSION['admin_id'];
$sqlUserProfile = "SELECT * FROM admin WHERE admin_id = $admin_id";
$resultUserProfile = mysqli_query($conn, $sqlUserProfile);
$userData = mysqli_fetch_assoc($resultUserProfile);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Profile</title>
    <!-- Add your CSS styling here -->
</head>
<body>
    <header>
        <h1>admin Profile</h1>
    </header>

    <nav>
        <!-- Navigation menu, similar to your existing code -->
    </nav>

    <main>
    <h2>Welcome, <?= isset($userData['admin_namalengkap']) ? $userData['admin_namalengkap'] : '' ?>!</h2>

<div>
    <p><strong>ID:</strong> <?= isset($userData['admin_id']) ? $userData['admin_id'] : '' ?></p>
    <p><strong>Nama Lengkap:</strong> <?= isset($userData['admin_namalengkap']) ? $userData['admin_namalengkap'] : '' ?></p>
    <p><strong>admin username:</strong> <?= isset($userData['admin_username']) ? $userData['admin_username'] : '' ?></p>
    <p><strong>admin_password:</strong> <?= isset($userData['admin_password']) ? $userData['admin_password'] : '' ?></p>
    <!-- Tambahkan kolom data pengguna lainnya sesuai kebutuhan -->
</div>
<a href="edit_profile.php">Edit Profile</a>


        <!-- Add more content or features as needed for the user profile page -->
    </main>
</body>
</html>
