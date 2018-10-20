<?php
ini_set("display_errors", 1);
require $_SERVER['DOCUMENT_ROOT'] . '/inc/functions.php';
print_r(getUserById("2"));

echo "<br /><br /><hr /><br /><br />";
echo getUserIdByName("Santen");
?>