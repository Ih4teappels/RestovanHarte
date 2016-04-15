<?php

// echo "<br><h3>Beste " .  $user['name'] . ", je hebt nu $user_count correcte code(s) op je account ingevoerd</h3>";
// //echo "<h3>dus je hebt nu $points punten</h3>";
echo '<div id="spaarkaart"><h2>Spaarkaart</h2>';
echo '<h3>Je hebt nu ' . $points . ' punten!<div id="harts">';
echo str_repeat('<img id="spaarHart" src="img/spaarpunt_hartje.png">', $user_count);
echo '</div></div>';
?>