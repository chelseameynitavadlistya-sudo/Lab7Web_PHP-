
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 7 - PHP</title>
</head>
<body>

    <h3>Pengolahan Data Barang</h3>

    <?php
        $hasil = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $barang = trim($_POST["barang"] ?? "");
            $hargaInput = $_POST["harga"] ?? "";
            $jumlahInput = $_POST["jumlah"] ?? "";

            if (
                $barang === "" ||
                !is_numeric($hargaInput) ||
                !ctype_digit((string)$jumlahInput) ||
                (float)$hargaInput < 0 ||
                (int)$jumlahInput < 1
            ) {
                $error = "Periksa kembali nama barang, harga, dan jumlah.";
            } else {
                $harga = (float)$hargaInput;
                $jumlah = (int)$jumlahInput;
                $subtotal = $harga * $jumlah;
            }
        }
    ?>

    <form method="POST">
        <label>Nama barang:
            <input name="barang" required>
        </label>
        <br><br>

        <label>Harga:
            <input name="harga" type="number"
            min="0" step="0.01" required>
        </label>
        <br><br>

        <label>Jumlah:
            <input name="jumlah" type="number"
            min="1" step="1" required>
        </label>
        <br><br>

        <button type="submit">Hitung</button>
    </form>

    <?php
        if (isset($error)) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        } elseif (isset($subtotal)) {
            echo "<h3>Ringkasan Transaksi</h3>";
            echo "Barang: " . htmlspecialchars($barang) . "<br>";
            echo "Harga: Rp" . number_format($harga, 0, ",", ".") . "<br>";
            echo "Jumlah: " . $jumlah . "<br>";
            echo "Subtotal: Rp" . number_format($subtotal, 0, ",", ".");
        }
    ?>

</body>
</html>
