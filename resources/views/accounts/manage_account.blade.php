<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users | Admin Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="manage_users.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="admin_dashboard.php"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="manage_users.php" class="active"><i class='bx bx-user-plus'></i> Manage Users</a></li>
        <li><a href="#"><i class='bx bx-calendar-check'></i> Appointments</a></li>
        <li><a href="#"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="login.php" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <main class="main-content">
      <header style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Manage Users</h1>
        <a href="add_user.php" class="add-btn">+ Add User</a>
      </header>

      <section class="content-section active">
        <table class="user-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = $conn->query("SELECT * FROM users");
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td data-label='ID'>{$row['id']}</td>
                        <td data-label='Full Name'>{$row['fullname']}</td>
                        <td data-label='Email'>{$row['email']}</td>
                        <td data-label='Role'>{$row['role']}</td>
                        <td data-label='Actions'>
                          <a href='edit_user.php?id={$row['id']}' class='edit-btn'>Edit</a>
                          <a href='delete_user.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Delete this user?\");'>Delete</a>
                        </td>
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</body>
</html>
