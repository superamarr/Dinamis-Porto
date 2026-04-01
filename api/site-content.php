<?php
header('Content-Type: application/json; charset=utf-8');

// Default/fallback content (same as current hardcoded portfolio)
$default = [
    'hero' => [
        'fullName' => 'Taufik Ramadhani',
        'callName' => 'Taufik',
        'taglineTop' => "I'm a fullstack developer, data analyst,",
        'taglineBottom' => 'ai enthusiast',
    ],
    'profile' => [
        'name' => 'Taufik Ramadhani',
        'roleText' => 'Fullstack Developer · Data Analyst · AI Enthusiast',
        'locationText' => '📍 Samarinda, Indonesia',
        'dicodingUrl' => 'https://www.dicoding.com/users/zzeekkuu',
        'photoPath' => 'assets/images/Taufik Ramadhani.png',
    ],
    'aboutText' => "Hey, I'm Taufik Ramadhani, though most people simply call me Taufik.\nI'm a fullstack developer, data analyst, and AI enthusiast based in Indonesia.\nI'm passionate about building scalable systems, transforming data\ninto meaningful insights, and turning ideas into functional digital products.\nI'm constantly exploring emerging technologies and pushing myself\nto grow through innovative and creative problem-solving.",
    'skills' => [
        ['id' => 1, 'name' => 'JavaScript', 'percent' => 85],
        ['id' => 2, 'name' => 'React.js', 'percent' => 80],
        ['id' => 3, 'name' => 'Laravel', 'percent' => 75],
        ['id' => 4, 'name' => 'Next.js', 'percent' => 78],
        ['id' => 5, 'name' => 'Golang', 'percent' => 60],
        ['id' => 6, 'name' => 'Flutter', 'percent' => 65],
    ],
    'experiences' => [
        [
            'id' => 1,
            'role' => 'Full Stack Developer',
            'timeRange' => 'Feb 2026 — Saat ini',
            'org' => 'Coding Camp powered by DBS Foundation · Magang · Samarinda, Kalimantan Timur · Jarak jauh',
            'description' => 'React.js, Node.js, dan teknologi terkait.',
        ],
        [
            'id' => 2,
            'role' => 'Laboratory Assistant: Data Analytics and Visualization',
            'timeRange' => 'Feb 2026 — Saat ini',
            'org' => 'Universitas Mulawarman · Kontrak · Samarinda, Kalimantan Timur',
            'description' => 'Tableau · Pendampingan praktikum analitik dan visualisasi data.',
        ],
        [
            'id' => 3,
            'role' => 'Laboratory Assistant: Fundamentals of Programming',
            'timeRange' => 'Agu 2025 — Jan 2026 · 6 bln',
            'org' => 'Universitas Mulawarman · Kontrak · Samarinda, Kalimantan Timur',
            'description' => 'Python · Pendampingan praktikum dasar pemrograman.',
        ],
        [
            'id' => 4,
            'role' => 'Staff of Department Professional Skill Development',
            'timeRange' => 'Feb 2025 — Jan 2026 · 1 thn',
            'org' => 'Information System Association (INFORSA) · Kontrak · Samarinda, Kalimantan Timur',
            'description' => 'Laravel, PHP, dan pengembangan kemampuan profesional.',
        ],
    ],
    'certs' => [
        [
            'id' => 1,
            'title' => 'The Python Programmer 2025',
            'issuer' => 'Udemy',
            'year' => '2024',
            'src' => 'assets/images/PythonProgrammer.jpeg',
            'link' => 'assets/images/PythonProgrammer.jpeg',
        ],
        [
            'id' => 2,
            'title' => 'Pemrograman untuk Pengembang Software',
            'issuer' => 'Dicoding',
            'year' => '2026',
            'src' => 'assets/images/SoftwareDev.png',
            'link' => 'assets/images/SoftwareDev.png',
        ],
        [
            'id' => 3,
            'title' => 'Data Visualization with Python',
            'issuer' => 'Udemy',
            'year' => '2025',
            'src' => 'assets/images/Data Analyst.jpeg',
            'link' => 'assets/images/Data Analyst.jpeg',
        ],
    ],
    'settings' => [
        'copyrightYear' => 2025,
        'ownerName' => 'Taufik Ramadhani',
        'portfolioUrl' => 'https://www.dicoding.com/users/zzeekkuu',
        'portfolioLabel' => 'Portofolio',
    ],
];

try {
    $pdo = require_once __DIR__ . '/../config/db.php';

    // Hero (singleton row id=1)
    $stmt = $pdo->prepare('SELECT full_name, call_name, tagline_top, tagline_bottom FROM site_hero WHERE id = 1 LIMIT 1');
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row) {
        $default['hero'] = [
            'fullName' => $row['full_name'],
            'callName' => $row['call_name'],
            'taglineTop' => $row['tagline_top'],
            'taglineBottom' => $row['tagline_bottom'],
        ];
    }

    // Profile (singleton row id=1)
    $stmt = $pdo->prepare('SELECT name, role_text, location_text, dicoding_url, photo_path FROM site_profile WHERE id = 1 LIMIT 1');
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row) {
        $default['profile'] = [
            'name' => $row['name'],
            'roleText' => $row['role_text'],
            'locationText' => $row['location_text'],
            'dicodingUrl' => $row['dicoding_url'],
            'photoPath' => $row['photo_path'],
        ];
    }

    // About (singleton row id=1)
    $stmt = $pdo->prepare('SELECT about_text FROM site_about WHERE id = 1 LIMIT 1');
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row && isset($row['about_text'])) {
        $default['aboutText'] = $row['about_text'];
    }

    // Skills
    $stmt = $pdo->query('SELECT id, name, percent, sort_order FROM skills ORDER BY sort_order ASC, id ASC');
    $skills = $stmt->fetchAll();
    if ($skills) {
        $default['skills'] = array_map(function ($r) {
            return ['id' => (int)$r['id'], 'name' => $r['name'], 'percent' => (int)$r['percent']];
        }, $skills);
    }

    // Experiences
    $stmt = $pdo->query('SELECT id, role, time_range, org, description, sort_order FROM experiences ORDER BY sort_order ASC, id ASC');
    $exps = $stmt->fetchAll();
    if ($exps) {
        $default['experiences'] = array_map(function ($r) {
            return [
                'id' => (int)$r['id'],
                'role' => $r['role'],
                'timeRange' => $r['time_range'],
                'org' => $r['org'],
                'description' => $r['description'],
            ];
        }, $exps);
    }

    // Certificates
    $stmt = $pdo->query('SELECT id, title, issuer, year, image_path, link, sort_order FROM certificates ORDER BY sort_order ASC, id ASC');
    $certs = $stmt->fetchAll();
    if ($certs) {
        $default['certs'] = array_map(function ($r) {
            return [
                'id' => (int)$r['id'],
                'title' => $r['title'],
                'issuer' => $r['issuer'],
                'year' => $r['year'],
                'src' => $r['image_path'],
                'link' => $r['link'],
            ];
        }, $certs);
    }

    // Settings
    $stmt = $pdo->prepare('SELECT copyright_year, owner_name, portfolio_url, portfolio_label FROM site_settings WHERE id = 1 LIMIT 1');
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row) {
        $default['settings'] = [
            'copyrightYear' => (int)$row['copyright_year'],
            'ownerName' => $row['owner_name'],
            'portfolioUrl' => $row['portfolio_url'],
            'portfolioLabel' => $row['portfolio_label'],
        ];
    }
} catch (Throwable $e) {
    // Keep fallback content so the site still renders even before DB is configured.
}

echo json_encode($default, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

