@php
  use Illuminate\Support\Facades\DB;

  // Count total appointments today
  $today = now()->toDateString();
  $totalAppointmentsToday = DB::table('appointments')->whereDate('date', $today)->count();

  // Count total patients
  $totalPatients = DB::table('patients')->count();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Dashboard</title>
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Nurse Panel</h2>
      <ul>
        <li><a href="{{ url('/staff/dashboard') }}" class="active"><i class='bx bx-home'></i> Home</a></li>
        <li><a href="{{ url('/staff/appointments') }}"><i class='bx bx-calendar-check'></i> Appointments</a></li>
        <li><a href="{{ url('/staff/patients') }}"><i class='bx bx-user'></i> Patients</a></li>
        <li><a href="{{ url('/staff/reports') }}"><i class='bx bx-file'></i> Reports</a></li>
        <li><a href="/logout" class="logout"><i class='bx bx-log-out'></i> Logout</a></li>
      </ul>
    </aside>

    <main class="main-content">
      <header>
        <h1>Welcome, Nurse!</h1>
        <p>Manage patient appointments and update records.</p>
      </header>

      <section class="cards">
        <div class="card">
          <i class='bx bx-calendar-check'></i>
          <h3>Today’s Appointments</h3>
          <p>{{ $totalAppointmentsToday }} Scheduled Consultation{{ $totalAppointmentsToday == 1 ? '' : 's' }}</p>
        </div>
        <div class="card">
          <i class='bx bx-user'></i>
          <h3>Total Patients</h3>
          <p>{{ $totalPatients }} Active Patient{{ $totalPatients == 1 ? '' : 's' }}</p>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
