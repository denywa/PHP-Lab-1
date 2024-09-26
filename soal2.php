<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Arrays</title>
</head>
<body>
    <!-- Form untuk memasukkan deret angka pertama dan kedua serta jumlah elemen masing-masing -->
    <form method="post" style="display: flex; flex-direction: column; max-width: 300px; margin: start;">
        <label for="nums1">Masukkan deret angka pertama (nums1):</label>
        <input type="text" id="nums1" name="nums1" placeholder="0,0,0,0,..." >
        <br>
        <label for="m">Masukkan jumlah elemen untuk deret pertama (m):</label>
        <input type="number" id="m" name="m" placeholder="0" required>
        <br>
        <label for="nums2">Masukkan deret angka kedua:</label>
        <input type="text" id="nums2" name="nums2" placeholder="0,0,0,0,..." >
        <br>
        <label for="n">Masukkan jumlah elemen untuk deret kedua (n):</label>
        <input type="number" id="n" name="n" placeholder="0" required>
        <br>
        <input type="submit" value="Merge Arrays">
    </form>
    <?php
    // Fungsi untuk menggabungkan dua array dan mengurutkannya
    function merge(&$nums1, $m, $nums2, $n) {
        // Mengambil elemen dari nums1 sebanyak m elemen
        $nums1 = array_slice($nums1, 0, $m);
        // Mengambil elemen dari nums2 sebanyak n elemen
        $nums2 = array_slice($nums2, 0, $n);
        // Menggabungkan kedua array
        $merged = array_merge($nums1, $nums2);
        // Mengurutkan array hasil penggabungan
        sort($merged);
        // Mengembalikan array yang telah digabung dan diurutkan
        return $merged;
    }

    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Menampilkan input yang dimasukkan oleh pengguna
        echo "<h2>Input:</h2>";
        echo "<p>nums1: " . htmlspecialchars($_POST["nums1"]) . "</p>";
        echo "<p>m: " . htmlspecialchars($_POST["m"]) . "</p>";
        echo "<p>nums2: " . htmlspecialchars($_POST["nums2"]) . "</p>";
        echo "<p>n: " . htmlspecialchars($_POST["n"]) . "</p>";
    }

    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengubah string input nums1 menjadi array integer
        $nums1 = array_map('intval', explode(',', $_POST["nums1"]));
        // Mengubah input m menjadi integer
        $m = intval($_POST["m"]);
        // Mengubah string input nums2 menjadi array integer
        $nums2 = array_map('intval', explode(',', $_POST["nums2"]));
        // Mengubah input n menjadi integer
        $n = intval($_POST["n"]);

        // Memanggil fungsi merge untuk menggabungkan dan mengurutkan array
        $mergedArray = merge($nums1, $m, $nums2, $n);

        // Menampilkan penjelasan mengenai array yang digabungkan
        echo "<h2>Explanation:</h2>";
        echo "<p>The arrays we are merging are " . implode(', ', array_slice($nums1, 0, $m)) . " and " . implode(', ', array_slice($nums2, 0, $n)) . ".</p>";
        
        // Menampilkan hasil array yang telah digabungkan dan diurutkan
        echo "<h2>Output :</h2>";
        echo "<p>" . implode(', ', $mergedArray) . "</p>";

    }
    ?>
</body>
</html>