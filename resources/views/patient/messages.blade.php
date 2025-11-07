<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <style>
    .messages-container {
      background: #fff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      animation: fadeIn 0.6s ease-in-out;
    }

    .message {
      padding: 15px;
      border-bottom: 1px solid #eee;
    }

    .message:last-child {
      border-bottom: none;
    }

    .message .sender {
      font-weight: 600;
      color: #00bcd4;
    }

    .message .text {
      color: #555;
      margin-top: 4px;
    }

    .message .time {
      font-size: 12px;
      color: #999;
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    @include('partials.patient_sidebar')

    <main class="main-content">
      <header>
        <h1><i class='bx bx-message'></i> Messages</h1>
        <p>View messages from your healthcare provider.</p>
      </header>

      <div class="messages-container">
        <div class="message">
          <div class="sender">Dr. Santos</div>
          <div class="text">Please remember to take your medicine after meals.</div>
          <div class="time">Oct 22, 2025 - 3:45 PM</div>
        </div>

        <div class="message">
          <div class="sender">Dr. Reyes</div>
          <div class="text">Your next appointment is confirmed for Nov 2, 2025.</div>
          <div class="time">Oct 21, 2025 - 11:30 AM</div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
