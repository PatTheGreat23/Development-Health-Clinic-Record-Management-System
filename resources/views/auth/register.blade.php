<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="/register">
      @csrf
      <h1>Register</h1>

      {{-- Error messages --}}
      @if ($errors->any())
        <div style="color:red; text-align:center; margin-bottom:10px;">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      {{-- Success message --}}
      @if (session('success'))
        <p style="color:green; text-align:center;">{{ session('success') }}</p>
      @endif

      <div class="input-box">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <i class='bx bxs-user'></i>
      </div>

      <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class='bx bxs-envelope'></i>
      </div>

      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user-account'></i>
      </div>

      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>

      <div class="input-box">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <i class='bx bxs-lock'></i>
      </div>

      {{-- Role selection dropdown --}}
      <div class="role-select">
        <label for="role">Register as:</label>
        <select name="role" id="role" required>
          <option value="Patient" selected>Patient</option>
          <option value="Staff">Staff</option>
          <option value="Admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn">Register</button>

      <div class="register-link">
        <p>Already have an account? <a href="/login">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
