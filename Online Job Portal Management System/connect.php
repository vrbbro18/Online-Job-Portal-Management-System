
<?php require_once('inc/connection.php');
 ?>

<?php
header('Refresh: 1; url=Contactus.php');
	$Name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	

	// Database connection
$conn = new mysqli('localhost','root','','atj');
		$stmt = $conn->prepare("insert into contact_us(name, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $email,$message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	
?>