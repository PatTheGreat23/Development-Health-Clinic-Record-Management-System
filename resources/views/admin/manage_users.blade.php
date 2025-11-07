<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #f4f7fb;
      margin: 0;
      display: flex;
      min-height: 100vh;
      color: #2c3e50;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: #2c3e50;
      color: #fff;
      padding: 25px 20px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      margin: 18px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 15px;
      border-radius: 10px;
      transition: 0.3s;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background: #00bcd4;
      transform: translateX(5px);
    }

    .logout {
      color: #ff6b6b !important;
    }

    /* Main */
    .main-content {
      flex: 1;
      margin-left: 270px;
      padding: 60px 70px;
      background: #f4f7fb;
    }

    header h1 {
      margin-bottom: 8px;
      color: #2c3e50;
      font-size: 28px;
    }

    header p {
      color: #555;
      margin-bottom: 40px;
    }

    /* Role Cards in a Row */
    .role-container {
      display: flex;
      justify-content: space-between;
      gap: 30px;
      flex-wrap: wrap;
    }

    .role-card {
      background: white;
      flex: 1;
      border-radius: 20px;
      padding: 40px 25px;
      text-align: center;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      cursor: pointer;
      transition: all 0.3s ease;
      min-width: 280px;
      max-width: 360px;
    }

    .role-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0, 188, 212, 0.25);
    }

    .role-card i {
      font-size: 58px;
      color: #00bcd4;
      margin-bottom: 15px;
    }

    .role-card h3 {
      margin: 10px 0;
      color: #2c3e50;
      font-size: 22px;
    }

    .role-card p {
      color: #666;
      font-size: 15px;
    }

    @media (max-width: 1000px) {
      .main-content {
        margin-left: 250px;
        padding: 40px 25px;
      }

      .role-container {
        justify-content: center;
      }

      .role-card {
        flex: 1 1 45%;
      }
    }

    @media (max-width: 700px) {
      .role-card {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="{{ url('/admin/dashboard') }}"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="{{ url('/admin/manage-users') }}" class="active"><i class='bx bx-user-plus'></i> Manage Users</a></li>
        <li><a href="{{ url('/admin/appointments') }}"><i class='bx bx-calendar-check'></i> Appointments</a></li>
        <li><a href="{{ url('/admin/reports') }}"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="/logout" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header>
        <h1>Manage Users</h1>
        <p>Select a user category to manage their accounts.</p>
      </header>

      <div class="role-container">
        <div class="role-card" onclick="window.location.href='{{ url('/admin/manage-users/patients') }}'">
          <i class='bx bx-user'></i>
          <h3>Patients</h3>
          <p>View and manage all patient accounts.</p>
        </div>

        <div class="role-card" onclick="window.location.href='{{ url('/admin/manage-users/doctors') }}'">
          <i class='bx bx-plus-medical'></i>
          <h3>Doctors</h3>
          <p>Manage doctors and their schedules.</p>
        </div>

        <div class="role-card" onclick="window.location.href='{{ url('/admin/manage-users/nurses') }}'">
          <i class='bx bx-injection'></i>
          <h3>Nurses</h3>
          <p>View nurse profiles and assigned patients.</p>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
