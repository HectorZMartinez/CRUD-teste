<?php
session_start();
if (!$_SESSION["usuario"]) {
    header("Location: logar.php");
    exit();
}
