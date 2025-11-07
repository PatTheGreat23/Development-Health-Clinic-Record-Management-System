<?php
include 'db_connect.php';

// Total patients
$total_patients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM patients"))['total'];

// Average age
$average_age = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AVG(age) AS avg_age FROM patients"))['avg_age'];

// Most common condition
$common_condition = mysqli_fetch_assoc(mysqli_query($conn, "SELECT conditions, COUNT(*) AS count FROM patients GROUP BY conditions ORDER BY count DESC LIMIT 1"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports | Staff Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Staff Panel</h2>
      <ul>
        <li><a href="staff_dashboard.php"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="#"><i class='bx bx-calendar-check'></i> Appointments</a></li>
        <li><a href="patients.php"><i class='bx bx-user'></i> Patients</a></li>
        <li><a href="reports.php" class="active"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="login.php" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <main class="main-content">
      <header>
        <h1>Clinic Reports</h1>
        <p>Summary of clinic data and patient statistics.</p>
      </header>

      <section class="cards">
        <div class="card">
          <i class='bx bx-user'></i>
          <h3>Total Patients</h3>
          <p><?php echo $total_patients; ?></p>
        </div>

        <div class="card">
          <i class='bx bx-pie-chart'></i>
          <h3>Average Age</h3>
          <p><?php echo number_format($average_age, 1); ?> years</p>
        </div>

        <div class="card">
          <i class='bx bx-heart'></i>
          <h3>Most Common Condition</h3>
          <p><?php echo $common_condition ? $common_condition['conditions'] : 'No data'; ?></p>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
