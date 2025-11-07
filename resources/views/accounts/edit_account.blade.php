<?php
include 'db_connect.php';

// Kunin ang user ID mula sa URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kunin ang user data mula sa database
    $result = $conn->query("SELECT * FROM users WHERE id = $id");

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "No user ID provided.";
    exit;
}

// Kapag nagsubmit ang form
if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $updateQuery = "UPDATE users SET fullname='$fullname', email='$email', role='$role' WHERE id=$id";

    if ($conn->query($updateQuery) === TRUE) {
        // Redirect pabalik sa manage_users page
        header("Location: manage_users.php");
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  <div class="dashboard">
    <main class="main-content">
      <header>
        <h1>Edit User</h1>
        <a href="manage_users.php" class="back-btn">← Back</a>
      </header>

      <section class="content-section">
        <form action="" method="POST" class="edit-form">
          <label>Full Name:</label>
          <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" required>

          <label>Email:</label>
          <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

          <label>Role:</label>
          <select name="role" required>
            <option value="admin" <?php if($user['role']=='admin') echo 'selected'; ?>>Admin</option>
            <option value="staff" <?php if($user['role']=='staff') echo 'selected'; ?>>Staff</option>
            <option value="patient" <?php if($user['role']=='patient') echo 'selected'; ?>>Patient</option>
          </select>

          <button type="submit" name="update" class="update-btn">Update User</button>
        </form>
      </section>
    </main>
  </div>
</body>
</html>
