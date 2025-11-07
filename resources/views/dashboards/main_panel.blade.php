/* RESET */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

/* BODY LAYOUT */
body {
  display: flex;
  flex-direction: row; /* Para magkatabi ang sidebar at main content */
  min-height: 100vh;
  background-color: #f4f6f9;
}

/* DASHBOARD CONTAINER */
.dashboard {
  display: flex;
  width: 100%;
}

/* SIDEBAR */
.sidebar {
  width: 250px;
  background: #2c3e50;
  color: #fff;
  padding: 20px;
  height: 100vh;
  flex-shrink: 0;
  position: fixed; /* Para nakadikit sa gilid */
  left: 0;
  top: 0;
}

.sidebar h2 {
  text-align: center;
  margin-bottom: 20px;
}

.sidebar ul {
  list-style: none;
}

.sidebar ul li {
  margin: 20px 0;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px;
  border-radius: 8px;
  transition: background 0.3s;
}

.sidebar ul li a:hover {
  background: #34495e;
}

.logout {
  color: #e74c3c;
}

/* MAIN CONTENT */
.main-content {
  flex: 1;
  padding: 30px;
  margin-left: 250px; /* Para hindi matabunan ng sidebar */
}

header h1 {
  color: #2c3e50;
  font-size: 28px;
}

header p {
  color: #555;
  margin-top: 5px;
}

/* CARDS */
.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 30px;
}

.card {
  background: #fff;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  text-align: center;
  transition: transform 0.2s;
}

.card:hover {
  transform: translateY(-5px);
}

.card i {
  font-size: 40px;
  color: #3498db;
  margin-bottom: 10px;
}

.card h3 {
  margin-bottom: 5px;
  color: #333;
}

