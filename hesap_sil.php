<?php
if($_GET)
{
    error_reporting(0);

require_once("baglan.php");

if($db->query("DELETE FROM account WHERE id=".(int)$_GET['id']))
{
    header("refresh:1;url=hesap_islemleri.php");
}



}




?>