
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 4 - PHP</title>
</head>
<body>

    <h3>Perhitungan Diskon Barang</h3>

    <?php
        function hitungDiskon($harga, $persen) {
            $potongan = $harga * ($persen / 100);
            return $harga - $potongan;
        }

        $hargaAkhir = hitungDiskon(150000, 10);

        echo "Harga setelah diskon: Rp" .
        number_format($hargaAkhir, 0, ",", ".");
    ?>

    <hr>

    <?php
        function hitungLuas($panjang, $lebar) {
            return $panjang * $lebar;
        }

        echo "Luas persegi panjang: " .
        hitungLuas(8, 4) . " cm²";
    ?>

</body>
</html>
