<?php
//func.logout.php

session_start();
session_destroy();
print "<script>document.location='login.php'</script>";

?>