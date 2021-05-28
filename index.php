<?php
    require_once __DIR__. '/database.php';

    $sql = 
    "SELECT *
     FROM prenotazioni_has_ospiti
     INNER JOIN stanze
     ON stanze.id = prenotazioni_has_ospiti.id";
    $result = $conn->query($sql);

    $rooms = [];

    if ($result && $result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <h1 class="title">lista stanze</h1>
    <ul class="rooms">
        <?php foreach($rooms as $room) {?>

            <li class="room">
                <span>
                    numero stanza:<?php echo $room['room_number'] ?>
                </span>
                
                <span>
                    piano:<?php echo $room['floor'] ?>
                </span>

                <span>
                    <a href="query.php?id=<?php echo $room['ospite_id'] ?>">Dettagli stanza</a>
                </span>
            </li>

        <?php } ?>
    </ul>
</body>
</html>