<?php
session_start();
session_unset();
session_destroy();
header("Location: http://trabalhofinal-afonso-alisson.atwebpages.com/clinica/");
exit();
?>