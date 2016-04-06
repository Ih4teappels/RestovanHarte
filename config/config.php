<?php 
// In dit bestand vind je alle instellingen, zoals databasegegevens.

// Definieer de status van het project
define('PROJECT_STATUS','development');

// Stel de instellingen in op Nederlands
setlocale(LC_ALL, 'nl_NL');


// databasegegevens

    if($_SERVER['HTTP_HOST'] == 'localhost'){
        define('DB_HOST','localhost');
        define('DB_NAME','codes');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','');
    } else {
        define('DB_HOST','127.0.0.1');
        define('DB_NAME','u672769328_resto	');
        define('DB_USERNAME','u672769328_resto');
        define('DB_PASSWORD','HG5vk8');
        //restoAdmin
        //HG5vk8
    }


?>
