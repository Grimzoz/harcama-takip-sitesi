<?php
require_once('baglan.php');

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genel Bakış</title>
</head>
<body>
    
<div style="position: absolute;width: 100%;left: 0; font-size: 18px; margin-left:0px; float: left;">
        <div class="row mt-5">
            <?php if(is_null( $_SESSION['user_id']))
            {
            header('Location: index.php');
            }
            require_once('menu.php');
            ?>
            <div class="col-4" id="yerles">
                <div class="card bg-dark ">
                        <div class="card-header bg-dark text-white">
                        
                        <b>Toplam Gelirler</b>
                        </div>
                        <div class="card-body text-white">
                        <?php 
                        $sorgu = $db->prepare("SELECT money_name,SUM(mon_value) t FROM account a INNER JOIN 
                        money_type m ON (a.mon_type=m.id) WHERE user_id=".$_SESSION['user_id']." GROUP BY mon_type");
                        $sorgu->execute();
                        $row = $sorgu->rowCount();
                        foreach ($sorgu as $value){
                         echo $value['money_name'].' : '.$value['t'].'</br>';       
                        }
                        ?>
                        </div>
                
                </div>
                </br>
                <div class="card bg-dark  ">
                        <div class="card-header bg-dark text-white">
                                Toplam Giderler
                        </div>
                        <div class="card-body text-white">
                         <?php 
                         $sorgu = $db->prepare("SELECT sum(harc_deger) as harc_deger,money_name,
                         (CASE `type` when 1 then 'Ulaşım' when 2 then 'Restoran' ELSE '' end) AS `cat`,
                         if(type=1,'Nakit','Kart') AS acc
                          FROM harcama h INNER JOIN money_type m ON (h.m_id=m.id) WHERE user_id=".$_SESSION['user_id']."  GROUP BY money_name,`cat`,acc");
                        $sorgu->execute();
                        $row = $sorgu->rowCount();
                        foreach ($sorgu as $value){
                         echo $value['cat'].' - '.$value['money_name'].' - '.  $value['acc']. ' : '.$value['harc_deger'].'</br>';       
                        }
                         ?>
                        </div>
                
                </div>
                </br>
                <div class="card bg-dark  ">
                        <div class="card-header bg-dark text-white">
                                Kalan
                        </div>
                        <div class="card-body text-white">
                         <?php 
                         $sorgu = $db->prepare("SELECT money_name,SUM(t) t FROM  (select money_name,SUM(mon_value) t FROM account a INNER JOIN 
                         money_type m ON (a.mon_type=m.id) WHERE user_id=".$_SESSION['user_id']." GROUP BY money_name
                         UNION all
 SELECT money_name,(SUM(harc_deger)*-1) AS t
  FROM harcama h INNER JOIN money_type m ON (h.m_id=m.id) WHERE user_id=".$_SESSION['user_id']."  GROUP BY money_name) t1 GROUP BY money_name");
                        $sorgu->execute();
                        $row = $sorgu->rowCount();
                        foreach ($sorgu as $value){
                         echo $value['money_name']. ' : '.$value['t'].'</br>';       
                        }
                         ?>
                        </div>
                
                </div>
            </div>
           
          

   
            
            

            
        </div>

</div>

           




</body>
</html>