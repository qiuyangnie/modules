<?php
usleep(isset($_GET['ms']) ? $_GET['ms'] * 1000 : 2000000);
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // past date!
header("Location: ".$_GET['loc']);
?>
