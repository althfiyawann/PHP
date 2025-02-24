<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Kebutuhan Kalori</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            text-align: center;
            padding: 30px;
        }

        .container {
            width: 40%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        button:hover {
            background: #218838;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
            background: #e9f5e9;
            padding: 15px;
            border-radius: 5px;
            font-weight: bold;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Kalkulator Kebutuhan Kalori</h2>
    <form method="POST">
        <input type="number" name="usia" placeholder="Masukkan usia Anda" required>
        <select name="jenis_kelamin">
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
        </select>
        <select name="aktivitas">
            <option value="sedentary">Sedentary (Jarang bergerak)</option>
            <option value="moderate">Moderate (Olahraga ringan)</option>
            <option value="active">Active (Olahraga rutin)</option>
        </select>
        <button type="submit" name="hitung">Hitung Kalori</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $usia = $_POST['usia'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $aktivitas = $_POST['aktivitas'];

        if ($jenis_kelamin == "pria") {
            if ($usia <= 18) $kalori = 2200;
            elseif ($usia <= 30) $kalori = 2500;
            elseif ($usia <= 50) $kalori = 2400;
            else $kalori = 2000;
        } else {
            if ($usia <= 18) $kalori = 1800;
            elseif ($usia <= 30) $kalori = 2000;
            elseif ($usia <= 50) $kalori = 1900;
            else $kalori = 1600;
        }

        if ($aktivitas == "sedentary") $kalori *= 1.0;
        elseif ($aktivitas == "moderate") $kalori *= 1.2;
        elseif ($aktivitas == "active") $kalori *= 1.4;

        echo "<div class='result'>Kebutuhan kalori harian Anda: " . intval($kalori) . " kalori.</div>";
    }
    ?>
</div>

</body>
</html>
