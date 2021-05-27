<?php
    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $dbname = "db-hotel";
    // Connect

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
    }

    $sql = "SELECT * FROM stanze";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        
    // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor']."<br>";
            $rooms[] = $row;
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>stanze</h1>
    <ul>
        <?php foreach($rooms as $room) {?>

            <li>
                piano: <?php echo $room['floor']?><br>
                stanza numero: <?php echo $room['room_number']?><br>
                numero letti: <?php echo $room['beds']?><br>
            </li>

        <?php } ?>
    </ul>
</body>
</html>