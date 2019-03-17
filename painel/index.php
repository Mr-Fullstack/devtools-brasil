<?php
ob_start();

include('../config.php');

if (Painel::logado() == false)
{
    include('login.php');
} else
{
    include('main.php');
}

ob_end_flush();

?>