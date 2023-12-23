<style>
    #message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #90EE90;
        color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
</style>

<?php
$servername = "localhost:3000";
$username = "root";
$password = "";
$dbname = "connect";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


	$name = $_POST["name"];
	$number = $_POST["number"];
	$email = $_POST["email"];
	$health = $_POST["health"];
	$doctor = $_POST["doctor"];
	$date = $_POST["date"];


$sql = "INSERT INTO  hospital(name, number, email, health, doctor, date) VALUES ('$name' ,'$number','$email' ,'$health', '$doctor','$date')";
if (mysqli_query($conn, $sql)) {

    session_start();
    $_SESSION['message'] = "Account created successfully | Redirecting to Login";


    mysqli_close($conn);


    echo "<script>setTimeout(function() {
        window.location.href = 'index.html';
    }, 2000);</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>

<div id="message">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</div>