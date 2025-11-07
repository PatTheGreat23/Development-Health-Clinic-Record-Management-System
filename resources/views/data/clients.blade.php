<?php
session_start();
include 'db_connect.php';

// Check if logged in
if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit;
}

// Get staff info
$staff_id = $_SESSION['staff_id'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];

// Handle form submissions
if (isset($_POST['add_patient'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conditions = $_POST['conditions'];

    // Insert patient with staff_id
    $sql = "INSERT INTO patients (name, age, conditions, staff_id) VALUES ('$name', '$age', '$conditions', '$staff_id')";
    mysqli_query($conn, $sql);
    header("Location: patients.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Delete only if the record belongs to the logged-in staff
    mysqli_query($conn, "DELETE FROM patients WHERE id=$id AND staff_id=$staff_id");
    header("Location: patients.php");
    exit();
}

if (isset($_POST['update_patient'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conditions = $_POST['conditions'];

    // Update only if the record belongs to the logged-in staff
    mysqli_query($conn, "UPDATE patients SET name='$name', age='$age', conditions='$conditions' WHERE id=$id AND staff_id=$staff_id");
    header("Location: patients.php");
    exit();
}

// Get all patients for the logged-in staff only
$result = mysqli_query($conn, "SELECT * FROM patients WHERE staff_id=$staff_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patients</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Staff Panel</h2>
      <ul>
        <li><a href="staff_dashboard.php"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="appointments.php"><i class='bx bx-calendar-check'></i> Appointments</a></li>
        <li><a href="patients.php" class="active"><i class='bx bx-user'></i> Patients</a></li>
        <li><a href="reports.php"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="login.php" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <main class="main-content">
      <h1>Patients</h1>

      <!-- Add patient form -->
      <form method="POST" style="margin-bottom:20px;">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="conditions" placeholder="Conditions" required>
        <button type="submit" name="add_patient">Add Patient</button>
      </form>

      <!-- Patient table -->
      <table border="1" cellpadding="10">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Conditions</th>
          <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['age']; ?></td>
            <td><?= $row['conditions']; ?></td>
            <td>
              <a href="patients.php?edit=<?= $row['id']; ?>">Edit</a> |
              <a href="patients.php?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </table>

      <!-- Edit patient form -->
      <?php
      if (isset($_GET['edit'])) {
          $id = $_GET['edit'];
          $edit = mysqli_query($conn, "SELECT * FROM patients WHERE id=$id AND staff_id=$staff_id");
          $patient = mysqli_fetch_assoc($edit);

          if ($patient) {
      ?>
      <h2>Edit Patient</h2>
      <form method="POST">
        <input type="hidden" name="id" value="<?= $patient['id']; ?>">
        <input type="text" name="name" value="<?= $patient['name']; ?>" required>
        <input type="number" name="age" value="<?= $patient['age']; ?>" required>
        <input type="text" name="conditions" value="<?= $patient['conditions']; ?>" required>
        <button type="submit" name="update_patient">Update Patient</button>
      </form>
      <?php
          }
      }
      ?>
    </main>
  </div>
</body>
</html>
