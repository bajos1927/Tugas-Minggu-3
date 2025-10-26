 <?php
// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Contoh data yang dianggap benar (belum tersimpan di database)
    $valid_username = "arulintang";
    $valid_password = "Arulintang20+"; // Harus ada huruf kapital dan simbol

    // Validasi apakah ada input kosong
    if (empty($username) || empty($password)) {
        echo "<p style='color:red; text-align:center;'>Username dan password wajib diisi!</p>";
        exit;
    }

    // Validasi kekuatan password (harus ada huruf besar dan simbol)
    if (!preg_match("/[A-Z]/", $password)) {
        echo "<p style='color:red; text-align:center;'>Password harus mengandung huruf kapital!</p>";
        exit;
    }
    if (!preg_match("/[\W]/", $password)) {
        echo "<p style='color:red; text-align:center;'>Password harus mengandung karakter unik (misal @, #, !, $)</p>";
        exit;
    }

    // Cek apakah username dan password cocok dengan yang ditentukan
    if ($username === $valid_username && $password === $valid_password) {
        echo "<h2 style='color:green; text-align:center;'>Login Berhasil!</h2>";
    } else {
        echo "<h2 style='color:red; text-align:center;'>Username atau Password salah!</h2>";
    }
} else {
    echo "<p style='color:red; text-align:center;'>Akses tidak valid.</p>";
}
?>
