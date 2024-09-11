<?php
include 'koneksi.php';
session_start();

if (isset($_GET['saranid'])) {
    $saranid = mysqli_real_escape_string($conn, $_GET['saranid']);

    // Query to delete the user
    $deleteQuery = mysqli_query($conn, "DELETE FROM saran WHERE saranid='$saranid'");

    if ($deleteQuery) {
        // Show an alert for successful deletion
        echo "<script>
                alert('Data pengguna berhasil dihapus');
                window.location.href = 'data_saran.php';
              </script>";
        exit();
    } else {
        // Show an alert for deletion error
        echo "<script>
                alert('Error deleting saran: " . mysqli_error($conn) . "');
                window.location.href = 'data_saran.php';
              </script>";
    }
} else {
    // Show an alert for invalid request
    echo "<script>
            alert('Invalid request');
            window.location.href = 'data_saran.php';
          </script>";
}

$conn->close();
?>
