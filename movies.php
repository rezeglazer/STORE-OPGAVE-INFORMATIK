<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "media_database";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name, rating, count, format, media_id FROM media";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
</head>

<body>
      <h1>Movies</h1> 

<style>
    table { border:1px solid black; }
</style>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Rating</th>
        <th>Count</th>
        <th>Format</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row["media_id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["rating"]; ?></td>
            <td><?php echo $row["count"]; ?></td>
            <td><?php echo $row["format"]; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<br>

<a href="interface.html">Tilbage</a>

</body>
</html>