<?php
include 'koneksi.php';
session_start();

if (isset($_GET['userid'])) {
    $userid = mysqli_real_escape_string($conn, $_GET['userid']);

    // Query to delete the user
    $deleteQuery = mysqli_query($conn, "DELETE FROM user WHERE userid='$userid'");

    if ($deleteQuery) {
        // Show an alert for successful deletion
        echo "<script>
                alert('Data pengguna berhasil dihapus');
                window.location.href = 'data_user.php';
              </script>";
        exit();
    } else {
        // Show an alert for deletion error
        echo "<script>
                alert('Error deleting user: " . mysqli_error($conn) . "');
                window.location.href = 'data_user.php';
              </script>";
    }
} else {
    // Show an alert for invalid request
    echo "<script>
            alert('Invalid request');
            window.location.href = 'data_user.php';
          </script>";
}

$conn->close();
?>
