<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nurses | Admin Panel</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #f4f6f9;
      margin: 0;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      background: #2c3e50;
      color: white;
      padding: 25px;
      position: fixed;
      height: 100vh;
    }

    .sidebar h2 { text-align: center; margin-bottom: 30px; }

    .sidebar ul { list-style: none; padding: 0; }
    .sidebar ul li { margin: 18px 0; }
    .sidebar ul li a {
      color: #fff; text-decoration: none; display: flex; align-items: center;
      gap: 10px; padding: 10px 15px; border-radius: 10px; transition: 0.3s;
    }
    .sidebar ul li a:hover, .sidebar ul li a.active {
      background: #00bcd4; transform: translateX(5px);
    }

    .main-content {
      flex: 1;
      margin-left: 270px;
      padding: 50px 60px;
    }

    header { margin-bottom: 25px; }
    header h1 { color: #2c3e50; font-size: 26px; margin-bottom: 5px; }
    header p { color: #666; font-size: 15px; }

    .search-bar {
      margin: 30px 0;
      display: flex;
      justify-content: flex-end;
    }

    .search-bar input {
      width: 320px; padding: 12px 15px; border-radius: 8px;
      border: 1px solid #ccc; font-size: 15px; transition: 0.3s;
    }

    .search-bar input:focus {
      outline: none; border-color: #00bcd4;
      box-shadow: 0 0 8px rgba(0, 188, 212, 0.3);
    }

    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      margin-top: 20px;
    }

    .card {
      background: #fff; border-radius: 16px; padding: 25px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.08);
      text-align: center; transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(0,188,212,0.25);
    }

    .card i {
      font-size: 48px; color: #00bcd4; margin-bottom: 12px;
    }

    .card h3 { color: #2c3e50; font-size: 20px; margin-bottom: 10px; }
    .card p { color: #555; font-size: 14px; margin: 6px 0; }
  </style>
</head>

<body>
  <aside class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="{{ url('/admin/dashboard') }}"><i class='bx bx-home'></i> Home</a></li>
      <li><a href="{{ url('/admin/manage-users') }}" class="active"><i class='bx bx-user'></i> Manage Users</a></li>
      <li><a href="{{ url('/admin/appointments') }}"><i class='bx bx-calendar'></i> Appointments</a></li>
      <li><a href="{{ url('/admin/reports') }}"><i class='bx bx-file'></i> Reports</a></li>
      <li><a href="/logout"><i class='bx bx-log-out'></i> Logout</a></li>
    </ul>
  </aside>

  <main class="main-content">
    <header>
      <h1>Nurses</h1>
      <p>View and manage all registered nurses.</p>
    </header>

    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search nurses...">
    </div>

    <div class="cards-container" id="nursesList">
      @foreach($nurses as $n)
        <div class="card">
          <i class='bx bx-user-voice'></i>
          <h3>{{ $n->fullname }}</h3>
          <p><strong>Email:</strong> {{ $n->email }}</p>
          <p><strong>Username:</strong> {{ $n->username }}</p>
        </div>
      @endforeach
    </div>
  </main>

  <script>
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.card');
    searchInput.addEventListener('input', function() {
      const term = this.value.toLowerCase();
      cards.forEach(card => {
        const name = card.querySelector('h3').textContent.toLowerCase();
        card.style.display = name.includes(term) ? 'block' : 'none';
      });
    });
  </script>
</body>
</html>
