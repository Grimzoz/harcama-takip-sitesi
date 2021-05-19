<?php
require_once('baglan.php');

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Kullanıcı Bilgileri</title>
    
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
            <div class="col-9  " id="yerles">
                
                    <div class="card bg-dark ">
                        <div class="card-header bg-dark text-white">
                            Kullanıcı İşlemleri
                        </div>
                        <div class="card-body text-white">

                        <?php
                            $sorgu=$db->prepare("SELECT * FROM user where id=".$_SESSION['user_id']);
                            $sorgu->execute();
                            $count = $sorgu->rowCount();
                            $row  = $sorgu->fetch(PDO::FETCH_ASSOC);
                            $id =$row['id'];
                        ?>                       
                            <table  class="table table-dark" align="center">
                            
                            <td colspan="10" align="center">Bilgileriniz</td>

                                
                                <tr>
                                <td>No</td> 
                                <td>Kullanıcı Adınız</td> 
                                <td>Mailiniz</td> 
                                <td>Şifreniz</td>
                                <td>Son Giriş Tarihi</td>
                                <td>Son Çıkış Tarihi</td>
                                </tr> 
                                <tr>       
                                <tr>       
                                <td><?=$row['id'];?></td>    
                                <td><?=$row['u_name'];?></td> 
                                <td><?=$row['u_mail'];?></td>
                                <td><?=$row['u_pass'];?></td> 
                                <td><?=$row['sys_log_time'];?></td>
                                <td><?=$row['sys_ext_time'];?></td> 
                            
                                <td><a href="kisi_duzenle.php?id=<?php echo $id;?>" class="btn btn-primary btn-lg">Düzenle</a></td>
                               
                                
                            </tr>
                    </table> 
                                
                          
                        </div>
                    </div>
                            
            </div> 
        </div> 
    </div> 
    </div>

</div>




</body>
</html>