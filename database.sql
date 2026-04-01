-- Run this in MySQL/MariaDB:
--   CREATE DATABASE porto_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
--   USE porto_cms;
--   SOURCE database.sql;

SET time_zone = '+00:00';

-- =========================
-- Content tables
-- =========================

DROP TABLE IF EXISTS certificates;
DROP TABLE IF EXISTS experiences;
DROP TABLE IF EXISTS skills;
DROP TABLE IF EXISTS site_settings;
DROP TABLE IF EXISTS site_about;
DROP TABLE IF EXISTS site_profile;
DROP TABLE IF EXISTS site_hero;

CREATE TABLE skills (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  percent INT NOT NULL,
  sort_order INT NOT NULL DEFAULT 0,
  CONSTRAINT chk_skills_percent CHECK (percent >= 0 AND percent <= 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE certificates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  issuer VARCHAR(200) NOT NULL,
  year VARCHAR(20) NOT NULL,
  image_path VARCHAR(255) NOT NULL,
  link VARCHAR(255) NOT NULL,
  sort_order INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE experiences (
  id INT AUTO_INCREMENT PRIMARY KEY,
  role VARCHAR(250) NOT NULL,
  time_range VARCHAR(120) NOT NULL,
  org VARCHAR(300) NOT NULL,
  description TEXT NOT NULL,
  sort_order INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Singleton tables (id=1)
CREATE TABLE site_hero (
  id INT PRIMARY KEY,
  full_name VARCHAR(200) NOT NULL,
  call_name VARCHAR(120) NOT NULL,
  tagline_top VARCHAR(200) NOT NULL,
  tagline_bottom VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE site_profile (
  id INT PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  role_text VARCHAR(300) NOT NULL,
  location_text VARCHAR(200) NOT NULL,
  dicoding_url VARCHAR(255) NOT NULL,
  photo_path VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE site_about (
  id INT PRIMARY KEY,
  about_text TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE site_settings (
  id INT PRIMARY KEY,
  copyright_year INT NOT NULL,
  owner_name VARCHAR(200) NOT NULL,
  portfolio_url VARCHAR(255) NOT NULL,
  portfolio_label VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- Seed data (defaults)
-- =========================

INSERT INTO site_hero (id, full_name, call_name, tagline_top, tagline_bottom) VALUES
(1, 'Taufik Ramadhani', 'Taufik', 'I''m a fullstack developer, data analyst,', 'ai enthusiast');

INSERT INTO site_profile (id, name, role_text, location_text, dicoding_url, photo_path) VALUES
(1, 'Taufik Ramadhani', 'Fullstack Developer · Data Analyst · AI Enthusiast', '📍 Samarinda, Indonesia', 'https://www.dicoding.com/users/zzeekkuu', 'assets/images/Taufik Ramadhani.png');

INSERT INTO site_about (id, about_text) VALUES
(1, 'Hey, I''m Taufik Ramadhani, though most people simply call me Taufik.
I''m a fullstack developer, data analyst, and AI enthusiast based in Indonesia.
I''m passionate about building scalable systems, transforming data
into meaningful insights, and turning ideas into functional digital products.
I''m constantly exploring emerging technologies and pushing myself
to grow through innovative and creative problem-solving.');

INSERT INTO site_settings (id, copyright_year, owner_name, portfolio_url, portfolio_label) VALUES
(1, 2025, 'Taufik Ramadhani', 'https://www.dicoding.com/users/zzeekkuu', 'Portofolio');

INSERT INTO skills (id, name, percent, sort_order) VALUES
(1, 'JavaScript', 85, 1),
(2, 'React.js', 80, 2),
(3, 'Laravel', 75, 3),
(4, 'Next.js', 78, 4),
(5, 'Golang', 60, 5),
(6, 'Flutter', 65, 6);

INSERT INTO experiences (id, role, time_range, org, description, sort_order) VALUES
(1, 'Full Stack Developer', 'Feb 2026 — Saat ini', 'Coding Camp powered by DBS Foundation · Magang · Samarinda, Kalimantan Timur · Jarak jauh', 'React.js, Node.js, dan teknologi terkait.', 1),
(2, 'Laboratory Assistant: Data Analytics and Visualization', 'Feb 2026 — Saat ini', 'Universitas Mulawarman · Kontrak · Samarinda, Kalimantan Timur', 'Tableau · Pendampingan praktikum analitik dan visualisasi data.', 2),
(3, 'Laboratory Assistant: Fundamentals of Programming', 'Agu 2025 — Jan 2026 · 6 bln', 'Universitas Mulawarman · Kontrak · Samarinda, Kalimantan Timur', 'Python · Pendampingan praktikum dasar pemrograman.', 3),
(4, 'Staff of Department Professional Skill Development', 'Feb 2025 — Jan 2026 · 1 thn', 'Information System Association (INFORSA) · Kontrak · Samarinda, Kalimantan Timur', 'Laravel, PHP, dan pengembangan kemampuan profesional.', 4);

INSERT INTO certificates (id, title, issuer, year, image_path, link, sort_order) VALUES
(1, 'The Python Programmer 2025', 'Udemy', '2024', 'assets/images/PythonProgrammer.jpeg', 'assets/images/PythonProgrammer.jpeg', 1),
(2, 'Pemrograman untuk Pengembang Software', 'Dicoding', '2026', 'assets/images/SoftwareDev.png', 'assets/images/SoftwareDev.png', 2),
(3, 'Data Visualization with Python', 'Udemy', '2025', 'assets/images/Data Analyst.jpeg', 'assets/images/Data Analyst.jpeg', 3);

