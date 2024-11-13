<?php
// index.php - Halaman Utama Aplikasi CRUD Sekolah
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CRUD Sekolah</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 900px;
            padding: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
            height: auto;
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5em;
            margin-top: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
            margin: 0;
        }
        li {
            background-color: #4CAF50;
            border-radius: 8px;
            text-align: center;
            padding: 20px;
            font-size: 1.2em;
            transition: transform 0.3s ease;
        }
        li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        li:hover {
            transform: translateY(-5px);
            background-color: #45a049;
        }
        li:active {
            transform: translateY(0);
            background-color: #388e3c;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 1em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        </div>
        <h1><center>Dashboard Sekolah</h1>
        <ul>
            <li><a href="siswa.php">Data Siswa</a></li>
            <li><a href="kelas.php">Data Kelas</a></li>
            <li><a href="guru.php">Data Guru</a></li>
            <li><a href="mata_pelajaran.php">Data Mata Pelajaran</a></li>
            <li><a href="jadwal.php">Data Jadwal Pelajaran</a></li>
        </ul>
        <footer>&copy; 2024 PPM Managemen</footer>
    </div>
</body>
</html>
