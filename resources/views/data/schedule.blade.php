<?php
include 'db_connect.php'; // Database connection

// ADD appointment
if (isset($_POST['add_appointment'])) {
    $patient_name = $_POST['patient_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO appointments (patient_name, date, time, reason) 
            VALUES ('$patient_name', '$date', '$time', '$reason')";
    mysqli_query($conn, $sql);
    header("Location: appointments.php");
    exit;
}

// DELETE appointment
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM appointments WHERE id=$id");
    header("Location: appointments.php");
    exit;
}

// EDIT appointment - get record
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result_edit = mysqli_query($conn, "SELECT * FROM appointments WHERE id=$id");
    $editData = mysqli_fetch_assoc($result_edit);
}

// UPDATE appointment
if (isset($_POST['update_appointment'])) {
    $id = $_POST['id'];
    $patient_name = $_POST['patient_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];

    mysqli_query($conn, "UPDATE appointments 
                         SET patient_name='$patient_name', date='$date', time='$time', reason='$reason' 
                         WHERE id=$id");
    header("Location: appointments.php");
    exit;
}

// GET all appointments
$result = mysqli_query($conn, "SELECT * FROM appointments ORDER BY date, time");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments | Staff Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Staff Panel</h2>
      <ul>
        <li><a href="staff_dashboard.php"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="appointments.php" class="active"><i class='bx bx-calendar-check'></i> Appointments</a></li>
        <li><a href="patients.php"><i class='bx bx-user'></i> Patients</a></li>
        <li><a href="reports.php"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="login.php" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <main class="main-content">
      <header>
        <h1>Appointments</h1>
        <p>Manage and schedule consultations.</p>
      </header>

      <!-- Add / Edit Form -->
      <section class="form-section">
        <?php if ($editData): ?>
          <h2>Edit Appointment</h2>
          <form method="POST">
            <input type="hidden" name="id" value="<?= $editData['id']; ?>">
            <input type="text" name="patient_name" value="<?= $editData['patient_name']; ?>" required>
            <input type="date" name="date" value="<?= $editData['date']; ?>" required>
            <input type="time" name="time" value="<?= $editData['time']; ?>" required>
            <input type="text" name="reason" value="<?= $editData['reason']; ?>" required>
            <button type="submit" name="update_appointment">Update Appointment</button>
            <a href="appointments.php" style="margin-left:10px;">Cancel</a>
          </form>
        <?php else: ?>
          <h2>Add Appointment</h2>
          <form method="POST">
            <input type="text" name="patient_name" placeholder="Patient Name" required>
            <input type="date" name="date" required>
            <input type="time" name="time" required>
            <input type="text" name="reason" placeholder="Reason" required>
            <button type="submit" name="add_appointment">Add Appointment</button>
          </form>
        <?php endif; ?>
      </section>

      <!-- Appointments Table -->
      <section class="table-section" style="margin-top:30px;">
        <h2>Appointment List</h2>
        <table border="1" cellpadding="8" cellspacing="0">
          <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Reason</th>
            <th>Actions</th>
          </tr>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><?= $row['patient_name']; ?></td>
              <td><?= $row['date']; ?></td>
              <td><?= $row['time']; ?></td>
              <td><?= $row['reason']; ?></td>
              <td>
                <a href="?edit=<?= $row['id']; ?>">Edit</a> |
                <a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </section>
    </main>
  </div>
</body>
</html>
