<?php

session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(),'',time() -84460 ,'/');
}

session_destroy();
header("refresh:0;url=looo.php");
exit();
