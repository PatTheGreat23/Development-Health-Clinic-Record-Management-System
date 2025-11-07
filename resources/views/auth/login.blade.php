<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    .error-message {
      color: #ff4444;
      text-align: center;
      margin-top: 10px;
      font-weight: 600;
    }
    .success-message {
      color: #28a745;
      text-align: center;
      margin-top: 10px;
      font-weight: 600;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <form method="POST" action="/login">
      @csrf
      <h1>Login</h1>

      @if ($errors->any())
        <div style="color:red; text-align:center;">
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
      </div>
    @endif

      {{-- Messages --}}
      @if (session('error'))
        <div class="error-message">{{ session('error') }}</div>
      @endif
      @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
      @endif

      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>

      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>

      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password?</a>
      </div>

      <button type="submit" class="btn">Login</button>

      <div class="register-link">
        <p>Don't have an account? <a href="/register">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
