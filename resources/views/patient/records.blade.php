<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Records</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <style>
    .record-card {
      background: #fff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      animation: fadeIn 0.7s ease-in-out;
    }

    .record-card h3 {
      color: #00bcd4;
      margin-bottom: 10px;
    }

    .record-card p {
      color: #555;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    @include('partials.patient_sidebar')

    <main class="main-content">
      <header>
        <h1><i class='bx bx-file'></i> Medical Records</h1>
        <p>Here are your previous medical reports and notes.</p>
      </header>

      <div class="record-card">
        <h3>Check-up: September 10, 2025</h3>
        <p><strong>Doctor:</strong> Dr. Santos</p>
        <p><strong>Diagnosis:</strong> Migraine</p>
        <p><strong>Prescription:</strong> Paracetamol 500mg, 3x a day</p>
      </div>

      <div class="record-card">
        <h3>Check-up: July 2, 2025</h3>
        <p><strong>Doctor:</strong> Dr. Reyes</p>
        <p><strong>Diagnosis:</strong> Allergic Rhinitis</p>
        <p><strong>Prescription:</strong> Cetirizine 10mg</p>
      </div>
    </main>
  </div>
</body>
</html>
