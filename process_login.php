
<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed");
}
else{
    echo "connected successfully";
}

$database="pm_ncit"; //dbname
$sql="CREATE DATABASE $database";
mysqli_select_db($conn, $database);
$tableName="logindata";
$sql = "CREATE TABLE IF NOT EXISTS $tableName ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) NOT NULL, 
    fpassword VARCHAR(255) NOT NULL 
)"; 
if (mysqli_query($conn, $sql)) { 
    echo "Table $tableName created successfully"; 
} else { 
    echo "Error creating table: " . mysqli_error($conn); 
} 
 
if (isset($_POST['email']) && isset($_POST['fpassword'])) { 
$email = $_POST['email']; 
$fpassword = $_POST['fpassword']; 
 
$insertQuery = "INSERT INTO $tableName (email, fpassword) VALUES ('$email', '$fpassword')"; 
    if (mysqli_query($conn, $insertQuery)) { 
        echo "Data inserted successfully"; 
        header("Location: website.php?email=$email&fpassword=$fpassword");
        exit; 
    } else { 
        echo "Error inserting data: " . mysqli_error($conn); 
    } 
} 
 
mysqli_close($conn);  
?>