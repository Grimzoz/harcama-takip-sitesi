<?php
include('baglan.php');
 //user_id=".$_SESSION['user_id']
$sorgu =$db->prepare("SELECT harc_deger,money_name,
(CASE `type` when 1 then 'Ulaşım' when 2 then 'Restoran' ELSE '' end) AS `type`,
if(type=1,'Nakit','Kart') AS acc
 FROM harcama h INNER JOIN money_type m ON (h.m_id=m.id) WHERE user_id=".$_SESSION['user_id']."");
$sorgu->execute();
$count = $sorgu->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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

    <title>Hesap İşlemleri</title>
</head>
<body>

<div style="position: absolute;width: 100%;left: 0; font-size: 18px; margin-left:0; float: left;">
    <div class="row mt-5 ">
        <?php if(is_null( $_SESSION['user_id']))
        {
        header('Location: index.php');
        }
        require_once('menu.php');
        ?>
        <div class="col-9 text-white " id="yerles">
            <div class="card bg-dark">
                <div class="card-header bg-dark">
                    Hesap İşlemleri
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="hesap_ekle.php" class="btn btn-primary btn-lg">Ekle</a></h5>
                
              
                        
                    <table  class="table table-dark" align="center">
                     
                            <td colspan="10" align="center">HESAPLAR</td>

                        
                        <tr>
                        <td>Hesap Türü</td> 
                        <td>Para Türü</td> 
                        <td>Harcama Türü</td> 
                        <td>Miktar</td>
                        </tr> 
                        <tr>       
                        <?php  
                                         
                        while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                       // $sonuc = $sorgu->fetch_assoc()
                            {  
                            $acc_type = $sonuc['acc']; 
                            $mon_type= $sonuc['money_name'];
                            $mon_value = $sonuc['harc_deger'];    
                            $type = $sonuc['type'];
                               
                        ?> 
                        <tr>       
                                  
                                <td><?=$acc_type;?></td> 
                                <td><?=$mon_type;?></td>
                                <td><?=$type;?></td> 
                                <td><?=$mon_value;?></td> 
                                
                                
                            </tr>
                            <?php
                }
                ?> 
                    </table> 
                    
                </div>
            </div>
        </div> 
    </div> 
</div> 
    
</body>
</html>