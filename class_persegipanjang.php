<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Persegi Panjang</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Kalkulator Persegi Panjang</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="panjang">Panjang:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-ruler"></i></span>
                    </div>
                    <input type="number" class="form-control" id="panjang" name="panjang" required>
                </div>
            </div>
            <div class="form-group">
                <label for="lebar">Lebar:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-ruler"></i></span>
                    </div>
                    <input type="number" class="form-control" id="lebar" name="lebar" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        class PersegiPanjang
        {
            public $panjang, $lebar;
            public function __construct($lebar, $panjang)
            {
                $this->panjang = $panjang;
                $this->lebar = $lebar;
            }

            public function rumusKeliling()
            {
                // Rumus keliling: 2 * (panjang + lebar)
                return 2 * ($this->panjang + $this->lebar);
            }

            public function rumusLuas()
            {
                // Rumus luas: panjang * lebar
                return $this->panjang * $this->lebar;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mendapatkan nilai panjang dan lebar dari form
            $panjang = $_POST["panjang"];
            $lebar = $_POST["lebar"];

            // Validasi input
            if ($panjang <= 0 || $lebar <= 0) {
                echo "<p class='text-danger'>Panjang dan lebar harus lebih dari 0.</p>";
            } else {
                // Membuat objek persegi panjang
                $persegiPanjang = new PersegiPanjang($lebar, $panjang);

                // Menghitung keliling dan luas persegi panjang
                $keliling = $persegiPanjang->rumusKeliling();
                $luas = $persegiPanjang->rumusLuas();

                // Menampilkan hasil
                echo "<h3 class='mt-4'>Hasil Perhitungan:</h3>";
                echo "<p>Panjang: " . $panjang . "</p>";
                echo "<p>Lebar: " . $lebar . "</p>";
                echo "<p>Keliling: " . $keliling . "</p>";
                echo "<p>Luas: " . $luas . "</p>";
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>