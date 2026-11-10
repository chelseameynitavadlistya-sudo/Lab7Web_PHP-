
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mini Project PHP</title>
</head>
<body>

    <h2>Formulir Data Mahasiswa</h2>

    <?php
        $data = null;
        $error = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nama = trim($_POST["nama"] ?? "");
            $nim = trim($_POST["nim"] ?? "");
            $prodi = trim($_POST["prodi"] ?? "");
            $semesterInput = $_POST["semester"] ?? "";
            $email = trim($_POST["email"] ?? "");

            // Validasi data
            if ($nama === "") {
                $error[] = "Nama wajib diisi.";
            }

            if ($nim === "") {
                $error[] = "NIM wajib diisi.";
            }

            if ($prodi === "") {
                $error[] = "Program studi wajib diisi.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Format email tidak valid.";
            }

            if (
                !ctype_digit((string)$semesterInput) ||
                (int)$semesterInput < 1 ||
                (int)$semesterInput > 14
            ) {
                $error[] = "Semester harus berupa angka 1-14.";
            }

            // Jika semua data valid
            if (!$error) {
                $data = compact(
                    "nama",
                    "nim",
                    "prodi",
                    "email"
                );

                $data["semester"] = (int)$semesterInput;
            }
        }
    ?>

    <form method="POST" action="">

        <label>Nama:</label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required>
        <br><br>

        <label>Program Studi:</label><br>
        <input type="text" name="prodi" required>
        <br><br>

        <label>Semester:</label><br>
        <input type="number" name="semester"
        min="1" max="14" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required>
        <br><br>

        <div>
        <button type="submit" name="kirim">Kirim Data</button>
        <button type="reset">Reset</button>
        </div>

    </form>

    <?php
        // Menampilkan pesan kesalahan
        if ($error) {
            echo "<h3>Terjadi Kesalahan:</h3>";

            foreach ($error as $pesan) {
                echo "<p>" .
                htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") .
                "</p>";
            }
        }

        // Menampilkan data jika valid
        if ($data !== null) {
            echo "<h3>Data Mahasiswa Berhasil Diterima</h3>";

            echo "Nama: " .
            htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") . "<br>";

            echo "NIM: " .
            htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") . "<br>";

            echo "Program Studi: " .
            htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") . "<br>";

            echo "Semester: " . $data["semester"] . "<br>";

            echo "Email: " .
            htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8");
        }
    ?>

</body>
</html>
