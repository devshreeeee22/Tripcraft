<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $postcode = $_POST['postcode'];
    $departure_date = $_POST['departure_date'];
    $travel_length = $_POST['travel_length'];
    $who_traveling = $_POST['who_traveling'];
    $message = $_POST['message'];
    $contact_method = $_POST['contact_method'];

    $conn = mysqli_connect('localhost', 'root', '', 'tripcraft');
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare("INSERT INTO enquiries (name, email, phone, postcode, departure_date, travel_length, who_traveling, message, contact_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("sssssssss", $name, $email, $phone, $postcode, $departure_date, $travel_length, $who_traveling, $message, $contact_method);

        if ($stmt->execute()) {
            header("Location: ../frontend/thankyou.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
