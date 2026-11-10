
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 3 - PHP</title>
</head>
<body>

    <?php
        $mahasiswa = [
            "Alya",
            "Bima",
            "Citra",
            "Doni",
            "Eka",
            "Fajar",
            "Gina"
        ];

        echo "<h3>Daftar Mahasiswa</h3>";
        echo "<ol>";

        foreach ($mahasiswa as $nama) {
            echo "<li>" . htmlspecialchars($nama) . "</li>";
        }

        echo "</ol>";
    ?>

</body>
</html>
