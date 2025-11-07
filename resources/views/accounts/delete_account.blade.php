<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hard delete: talagang tatanggalin sa database
    $query = "DELETE FROM users WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: manage_users.php");
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "No user ID provided.";
}
?>
