<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "media_database";
$port = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name, rating, count, format, media_id FROM media";
// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Process the result set
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["media_id"]. " - Name: " . $row["name"]. " - Rating: " . $row["rating"]. " - Count: " . $row["count"]. " - Format: " . $row["format"]. "<br> \n" ;
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>