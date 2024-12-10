<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dsn = "mysql:host=localhost;dbname=keripik_db;charset=utf8mb4";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];

        $sql = "DELETE FROM tickets WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Gagal menghapus data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}
?>
