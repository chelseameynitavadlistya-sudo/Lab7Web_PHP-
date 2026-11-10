
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 5 - PHP</title>
</head>
<body>

    <h3>Pencarian Kata Kunci</h3>

    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">
        <button type="submit">Cari</button>
    </form>

    <?php
        if (isset($_GET["kata"])) {
            $kata = trim($_GET["kata"]);

            echo "Kata kunci: " .
            htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
        }
    ?>

</body>
</html>
