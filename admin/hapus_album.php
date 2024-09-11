<?php
include 'koneksi.php';
session_start();

if (isset($_GET['albumid'])) {
    $albumid = mysqli_real_escape_string($conn, $_GET['albumid']);

    // Query to delete the user
    $deleteQuery = mysqli_query($conn, "DELETE FROM album WHERE albumid='$albumid'");

    if ($deleteQuery) {
        // Show an alert for successful deletion
        echo "<script>
                alert('Data pengguna berhasil dihapus');
                window.location.href = 'data_album.php';
              </script>";
        exit();
    } else {
        // Show an alert for deletion error
        echo "<script>
                alert('Error deleting album: " . mysqli_error($conn) . "');
                window.location.href = 'data_album.php';
              </script>";
    }
} else {
    // Show an alert for invalid request
    echo "<script>
            alert('Invalid request');
            window.location.href = 'data_album.php';
          </script>";
}

$conn->close();
?>
