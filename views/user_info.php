<?php

    echo '<section>Id: ' . $user['id'] . '</section><br>';

    echo '<section>Naam: ' . $user['name'] . '</section><br>';

    echo '<section>Geslacht: ' . $user['gender'] . '</section><br>';

    echo '<section>Email: ' . $user['email'] . '</section><br>';

    //Name it age so we can use the min and max atribute inside age_range
    $age = $user['age_range'];
    //shows the minimum age the person has
    echo '<section>Minimum Age: ' . $age['min'] . '</section><br>';


    echo "<section>Profile Picture:<br> <img src='".$picture['url']."'/></section>  ";

?>