<?php require __DIR__. "/database.php";

    $guest_id = $_GET['id'];

    $sql = 
    "SELECT *
     FROM ospiti
     WHERE ospiti.id = " . $guest_id . ";";

    $result = $conn->query($sql);

    $ospite = [];

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ospite = $row;
    }

    $conn->close();
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
    
    <ul class="rooms ospite">
        <li class="room ospite">
            <span>
                nome: 
            </span>
            <span>
                <?php echo $ospite['name']?>
            </span>
        </li>
        <li class="room ospite">
            <span>
                cognome: 
            </span>
            <span>
                <?php echo $ospite['lastname']?>
            </span>
        </li>
        <li class="room ospite">
            <span>
                data di nascita: 
            </span>
            <span>
                <?php echo $ospite['date_of_birth']?>
            </span>
        </li>
        <li class="room ospite">
            <span>
                documento: 
            </span>
            <span>
                <?php echo $ospite['document_type']?>
            </span>
        </li>
        <li class="room ospite">
            <span>
                numero documento: 
            </span>
            <span>
                <?php echo $ospite['document_number']?>
            </span>
        </li>
    </ul>

</body>
</html>