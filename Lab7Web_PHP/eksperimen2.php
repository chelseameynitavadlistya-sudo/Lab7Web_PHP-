
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 2 - PHP</title>
</head>
<body>

    <h2>Pencarian Nama Mahasiswa</h2>

    <?php
        $mahasiswa = [
            "Chelsea",
            "Alya",
            "Bima",
            "Citra",
            "Doni"
        ];
    ?>

    <form method="GET" action="">
        <label>Masukkan nama:</label>
        <input type="text" name="nama" required>
        <button type="submit">Cari</button>
    </form>

    <?php
        if (isset($_GET["nama"])) {
            $cari = trim($_GET["nama"]);

            if ($cari === "") {
                echo "<p>Nama tidak boleh kosong.</p>";
            } elseif (in_array($cari, $mahasiswa, true)) {
                echo "<p>Nama " .
                htmlspecialchars($cari) .
                " ditemukan dalam daftar mahasiswa.</p>";
            } else {
                echo "<p>Nama " .
                htmlspecialchars($cari) .
                " tidak ditemukan.</p>";
            }
        }
    ?>

</body>
</html>
