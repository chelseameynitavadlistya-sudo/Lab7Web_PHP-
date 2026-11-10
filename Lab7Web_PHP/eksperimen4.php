
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 4 - PHP</title>
</head>
<body>

    <h2>Validasi NIM Mahasiswa</h2>

    <form method="POST" action="">
        <label>Masukkan NIM:</label><br>
        <input type="text" name="nim" required>
        <button type="submit">Periksa NIM</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nim = trim($_POST["nim"] ?? "");

            if (!preg_match("/^[0-9]{9}$/", $nim)) {
                echo "<p>NIM tidak valid. NIM harus terdiri dari 9 digit angka.</p>";
            } else {
                echo "<p>NIM " .
                htmlspecialchars($nim, ENT_QUOTES, "UTF-8") .
                " valid.</p>";
            }
        }
    ?>

</body>
</html>
