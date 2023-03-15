<?php
// j'importe ma boite a outils.
include_once('./utils/Session.php');

$session = new Session();
$session->destroy();
header('Location: login.php');
