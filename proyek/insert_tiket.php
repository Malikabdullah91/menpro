<!-- insert_ticket.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $poster = $_FILES['poster']['name'];
    $poster_tmp = $_FILES['poster']['tmp_name'];
    $poster_dir = 'uploads/' . $poster;

    if (move_uploaded_file($poster_tmp, $poster_dir)) {
        try {
            $dsn = "mysql:host=localhost;dbname=keripik_db;charset=utf8mb4";
            $username = "root";
            $password = "";
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO tickets (poster, name, description, price, contact) 
                    VALUES (:poster, :name, :description, :price, :contact)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':poster', $poster);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':contact', $contact);

            if ($stmt->execute()) {
                header('Location: admin.php');
            } else {
                echo "Error: Unable to insert data.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
