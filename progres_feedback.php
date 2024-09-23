<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "feed"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = htmlspecialchars($_POST['feedback']);
    
    $sql = "INSERT INTO balik (feedback) VALUES ('$feedback')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<h3>Feedback submitted successfully! thanks for today,Byee</h3>";
        echo '<a href="index.php" class="back-home">Back Home</a>'; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
