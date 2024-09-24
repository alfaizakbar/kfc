<?php
session_start();
require '../database/konn.php';

$nama_pelanggan = $_SESSION["nama_pelanggan"];
// $nama_pelanggan = mysqli_real_escape_string($conn, $nama_pelanggan);
$pelanggan=queryy("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'")[0];

if(isset($_POST['ubah'])){
        if(ubah($_POST) > 0){
                echo "<script>alert('data berhasil di ubah');
                document.location.href = 'profile.php '</script>";
            } else {
                    echo "<script>alert('data gagal di ubah')</script>";
                }
                ;
            }
            ;
            // if ($pelanggan === false) {
            //     die("Error: " . $conn->error); 
            // }
error_reporting(0);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS for additional styling -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .profile-header {
      background-color: #fff;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-card {
      background-color: #fff;
      border-radius: 15px;
      padding: 2rem;
      text-align: center;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 1rem;
    }

    .social-links a {
      margin: 0 10px;
      font-size: 1.5rem;
      color: #495057;
    }

    .social-links a:hover {
      color: #007bff;
    }

    .modal-content {
      border-radius: 15px;
    }
  </style>
</head>

<body>



  <!-- Main Profile Section -->
  <div class="container mt-5">
    <div class="profile-header text-center mb-5">
      <h1 class="display-6">Profile Pelanggan</h1>
    
    </div>

    <div class="row d-flex align-items-stretch">
  <!-- Profile Info -->
  <div class="col-md-4">
    <div class="profile-card h-100 d-flex flex-column align-items-center text-center p-4">
      <img src="https://via.placeholder.com/120" alt="Profile" class="rounded-circle mb-3">
      <h2><?= $pelanggan['nama_pelanggan']?></h2>
      <h5>PELANGGAN</h5>

      <!-- <div class="social-links mt-3">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div> -->
    </div>
  </div>

  <!-- Profile Details -->
     <div class="col-md-8">
       <div class="profile-card h-100 p-4">
         <h5 class="card-title mb-4">Profile Details</h5>
               
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Nama Pelanggan</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['nama_pelanggan']?></div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Email</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['email']?></div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Alamat</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['alamat']?></div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 label text-start">Nomor HP</div>
            <div class="col-lg-8 text-start"><?= $pelanggan['no_hp']?></div>
          </div>

      <!-- Right-aligned button -->
      <div class="d-flex justify-content-end mt-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
      </div>
    </div>
  </div>
</div>

  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="mb-3">
              <label for="newUsername" class="form-label">New Username</label>
              <input type="text" class="form-control" name="nama_pelanggan" id="newUsername" value="<?= $pelanggan['nama_pelanggan']?>" required>
            </div>

            <div class="mb-3">
              <label for="newEmail" class="form-label">New Email</label>
              <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']?>">
              <input type="email" class="form-control" name="email" id="newEmail" value="<?= $pelanggan['email']?>" required>
            </div>

            <div class="mb-3">
              <label for="newEmail" class="form-label">New Alamat</label>
              <input type="text" class="form-control" name="alamat"  value="<?= $pelanggan['alamat']?>" required>
            </div>

            <div class="mb-3">
              <label for="newEmail" class="form-label">New Nomor HP</label>
              <input type="text" class="form-control" name="no_hp"  value="<?= $pelanggan['no_hp']?>" required>
            </div>

            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" name="password" id="newPassword" placeholder="Leave blank to keep current password">
              <div class="tp">
                    <input type="checkbox" onclick="myFunction()"><p>Tampilkan Password</p>
                </div>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-primary" name="ubah">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer mt-auto py-4 bg-light">
    <div class="container text-center">
      <span class="text-muted">&copy; 2024 My Website. All Rights Reserved.</span>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
        function myFunction() {
            var x = document.getElementById("newPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
