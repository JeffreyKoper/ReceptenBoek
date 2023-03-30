<?php
session_start();
// De huidige session, en alles wat er in staat word verwijderd.
session_destroy();
header("Location: index.php");
exit;

?>