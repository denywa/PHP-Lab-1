<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome</title>
</head>
<body>
    <!-- Form untuk memasukkan angka antara 1 hingga 50 -->
    <form method="post">
        <label for="number">Masukkan Angka (1-50):</label>
        <input type="number" id="number" name="number" min="1" max="50" required>
        <input type="submit" value="Generate Palindromes">
    </form>

    <?php
    // Fungsi untuk menghasilkan string palindrome berdasarkan angka yang diberikan
    function palindrome($n) {
        $palindrome = '';
        // Menambahkan angka dari 1 hingga n ke dalam string
        for ($i = 1; $i <= $n; $i++) {
            $palindrome .= $i;
        }
        // Menambahkan angka dari n-1 hingga 1 ke dalam string untuk membentuk palindrome
        for ($i = $n - 1; $i >= 1; $i--) {
            $palindrome .= $i;
        }
        return $palindrome;
    }

    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai angka yang dimasukkan dan mengubahnya menjadi integer
        $number = intval($_POST["number"]);
        // Mengecek apakah angka berada dalam rentang 1 hingga 50
        if ($number >= 1 && $number <= 50) {
            echo "<h2>Output:</h2>";
            // Menghasilkan dan menampilkan palindrome untuk setiap angka dari 1 hingga angka yang dimasukkan
            for ($i = 1; $i <= $number; $i++) {
                $palindrome = palindrome($i);
                // Menambahkan spasi untuk membuat tampilan lebih rapi
                $spaces = str_repeat('&nbsp;&nbsp;', $number - $i);
                echo $spaces . $palindrome . "<br>";
            }
        } else {
            // Menampilkan pesan error jika angka tidak berada dalam rentang 1 hingga 50
            echo "<p>Masukkan angka antara 1 sampai  50.</p>";  
        }
    }
    ?>
</body>
</html>