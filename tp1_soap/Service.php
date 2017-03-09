<?php

require './Client.php';

$id_array = array('id' => '1');
echo "Nom retrouné : ";
echo $client->getBookName($id_array);


