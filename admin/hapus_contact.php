<?php
include 'koneksi.php';
session_start();

if (isset($_GET['contactid'])) {
    $contactid = mysqli_real_escape_string($conn, $_GET['contactid']);

    // Query to delete the user
    $deleteQuery = mysqli_query($conn, "DELETE FROM contact WHERE contactid='$contactid'");

    if ($deleteQuery) {
        // Show an alert for successful deletion
        echo "<script>
                alert('Data pengguna berhasil dihapus');
                window.location.href = 'data_contact.php';
              </script>";
        exit();
    } else {
        // Show an alert for deletion error
        echo "<script>
                alert('Error deleting contact: " . mysqli_error($conn) . "');
                window.location.href = 'data_contact.php';
              </script>";
    }
} else {
    // Show an alert for invalid request
    echo "<script>
            alert('Invalid request');
            window.location.href = 'data_contact.php';
          </script>";
}

$conn->close();
?>
