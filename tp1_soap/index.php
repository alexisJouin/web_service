<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>TP1 - WEB SERVICE</title>
    </head>
    <body>
        <h1>TP1 - SOAP</h1>

        <?php
        include './Client.php';
        $client = new Client();
        $client->getBookName();
        echo json_encode($client);
        ?>

    </body>
</html>
