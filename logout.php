<?php
session_start();
session_unset();
session_destroy();

header("Location: /SAAD-WALEED/index.php");
exit();
?>