<?php
include('baglan.php');


if(!is_null($_SESSION['user_id']))
{
      session_unset('user_id');  
        session_destroy();
        header('Location: index.php');
    
}

?>