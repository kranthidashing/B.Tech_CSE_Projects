<?php
if (empty($_SESSION['User'])) 
{
    header("location:forbidden.html");
}
?>