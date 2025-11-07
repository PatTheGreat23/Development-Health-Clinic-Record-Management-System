<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Appointments</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <style>
    .content-card {
      background: #fff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      animation: fadeIn 0.6s ease-in-out;
    }

    .appointments-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .appointments-table th, .appointments-table td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    .appointments-table th {
      background: #00bcd4;
      color: white;
      font-weight: 600;
    }

    .status {
      font-weight: 600;
      border-radius: 6px;
      padding: 4px 8px;
      color: white;
    }

    .status.pending { background: #f39c12; }
    .status.approved { background: #2ecc71; }
    .status.cancelled { background: #e74c3c; }
  </style>
</head>
<body>
  <div class="dashboard">
    @include('partials.patient_sidebar')

    <main class="main-content">
      <header>
        <h1><i class='bx bx-calendar'></i> My Appointments</h1>
        <p>Track your upcoming and past appointments here.</p>
      </header>

      <div class="content-card">
        <table class="appointments-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Doctor</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Oct 24, 2025</td>
              <td>10:00 AM</td>
              <td>Dr. Santos</td>
              <td><span class="status approved">Approved</span></td>
            </tr>
            <tr>
              <td>Nov 2, 2025</td>
              <td>2:30 PM</td>
              <td>Dr. Reyes</td>
              <td><span class="status pending">Pending</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
