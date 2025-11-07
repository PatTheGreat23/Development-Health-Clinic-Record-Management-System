@php
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$userCount = Schema::hasTable('users') ? User::count() : 0;
$apptCount = Schema::hasTable('appointments') ? DB::table('appointments')->count() : 0;
$reportCount = Schema::hasTable('reports') ? DB::table('reports')->count() : 0;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

  <style>
    /* =============================
       ADMIN DASHBOARD STYLE
    ==============================*/

    body {
      background: #f4f6f9;
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
      animation: fadeIn 0.8s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: linear-gradient(180deg, #2c3e50, #1a252f);
      color: #fff;
      padding: 30px 20px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      display: flex;
      flex-direction: column;
      transition: all 0.3s ease;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      margin: 15px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 15px;
      border-radius: 10px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background: #00bcd4;
      color: #fff;
      transform: translateX(5px);
    }

    .logout {
      color: #ff4d4d !important;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      margin-left: 250px;
      padding: 40px 60px;
      transition: all 0.3s ease;
    }

    header h1 {
      font-size: 28px;
      color: #2c3e50;
      margin-bottom: 10px;
    }

    header p {
      color: #555;
      margin-bottom: 25px;
    }

    /* Cards Section */
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 25px;
    }

    .card {
      background: #fff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .card:hover {
      transform: translateY(-6px) scale(1.03);
      box-shadow: 0 8px 20px rgba(0, 188, 212, 0.3);
    }

    .card i {
      font-size: 48px;
      color: #00bcd4;
      margin-bottom: 12px;
    }

    .card h3 {
      color: #333;
      font-size: 20px;
      margin-bottom: 5px;
    }

    .card p {
      color: #555;
      font-size: 15px;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .sidebar {
        width: 200px;
      }
      .main-content {
        margin-left: 200px;
        padding: 30px;
      }
    }

    @media (max-width: 700px) {
      .sidebar {
        position: absolute;
        left: -250px;
      }

      .sidebar.active {
        left: 0;
      }

      .main-content {
        margin-left: 0;
        padding: 25px;
      }

      header h1 {
        font-size: 22px;
      }
    }
  </style>
</head>

<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="{{ url('/admin/dashboard') }}" class="active"><i class='bx bx-home'></i> Dashboard</a></li>
        <li><a href="{{ url('/admin/manage-users') }}"><i class='bx bx-user'></i> Manage Users</a></li>
        <li><a href="{{ url('/admin/appointments') }}"><i class='bx bx-calendar'></i> Appointments</a></li>
        <li><a href="{{ url('/admin/reports') }}"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="{{ url('/admin/settings') }}"><i class='bx bx-cog'></i> Settings</a></li>
        <li><a href="/logout" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <main class="main-content">
      <header>
        <h1>Welcome, Admin!</h1>
        <p>Monitor and manage system operations here.</p>
      </header>

      <section class="cards">
        <div class="card" onclick="window.location.href='{{ url('/admin/manage-users') }}'">
          <i class='bx bx-user'></i>
          <h3>Total Users</h3>
          <p>{{ $userCount }} Registered Accounts</p>
        </div>

        <div class="card" onclick="window.location.href='{{ url('/admin/appointments') }}'">
          <i class='bx bx-calendar'></i>
          <h3>Appointments</h3>
          <p>{{ $apptCount }} Total Appointments</p>
        </div>

        <div class="card" onclick="window.location.href='{{ url('/admin/reports') }}'">
          <i class='bx bx-file'></i>
          <h3>Reports</h3>
          <p>{{ $reportCount }} New Reports</p>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
