CREATE DATABASE hcrm_system;

USE hcrm_system;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('Admin', 'Staff', 'Patient') NOT NULL DEFAULT 'Patient',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  age INT NOT NULL,
  conditions VARCHAR(255) NOT NULL,
  staff_id INT NOT NULL
);

CREATE TABLE appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_name VARCHAR(100) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  reason VARCHAR(255) NOT NULL
);

UPDATE users
SET id = 10
WHERE id = 11;

SELECT *FROM users;
SELECT *FROM patients;

DROP TABLE patients;
DROP TABLE appointments;
DROP TABLE users;