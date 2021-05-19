<?php
require_once('baglan.php');
$sorgu=$db->prepare("SELECT harcama.id, ulasim_miktar,rest_miktar FROM harcama 
INNER JOIN ulasim ON harcama.harc_deger = ulasim.id");
$sorgu->execute();
$count = $sorgu->rowCount();



?>
<!DOCTYPE html>
<html lang="en">
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
    <title>Hesap Ekle</title>
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
            <div class="col-9" id="yerles">
                  <div class="row ml-5">
                    <div class="col">
                    
                       
                        <?php  
                            $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
                            $id = $sonuc['id'];
                            $harcanan = $sonuc['harcanan']; 
                            $harc_deger = $sonuc['harc_deger'];                        
                        ?> 
                              
                            <div class="kate rounded-circle" data-toggle="modal" data-target="#ulasim"
                            style= " background-color: orange;">
                            
                            <a href="#">
                                <img src="img/bus.png"class="ic-resim" ></img>
                                <label class="lbl-konum">Ulaşım</label>
                                <br>
                                <label  class="lbl-konum-miktar"><?=$harc_deger;?></label>   
                                
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <div class="kate rounded-circle" data-toggle="modal" data-target="#ulasim" style =" background-color: aqua;">
                            <a href="#"><img src="img/fork.png"class="ic-resim"></img></a>
                            <label class="lbl-konum">Restoran</label>
                            <label  class="lbl-konum-miktar"><?=$harc_deger;?></label>   
                        </div>
                    </div>
                    

                    
                    
                </div>

                <div class="modal fade" id="ulasim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark ">
                    <div class="modal-header bg-dark ">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ulaşım</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body bg-dark">
                        <form action="#" method="post" id="ulasim_form" onsubmit="return false;">
                                <table class="table text-white">
                                    <tr>
                                    <td>Hesap Türü</td>
                                <td>
                                    <div class="radio form-check text-white">
                                    <label><input type="radio" name="acc_type" id="acc_type" value="1" checked>Nakit</label>
                                    </div>
                                    <div class="radio form-check text-white">
                                    <label><input type="radio" name="acc_type"  id="acc_type" value="2">Kart</label>
                                    </div>
                                </td>
                                </tr>
                                <tr><td>Para Türü</td>
                                <td><select class="form-select form-select-lg mt-3 ml-0 col-12 text-dark" name="mon_type" id="mon_type" aria-label=".form-select-lg example ">
                                
                                <?php
                                $sorgu =$db->prepare("SELECT * FROM money_type");
                                $sorgu->execute();
                                $count = $sorgu->rowCount();
                                if ($sorgu->rowCount() > 0)
                                {
                                    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC))
                                    {
                                    //foreach ($sorgu as $veri){
                                         
                                        $id = $sonuc['id']; 
                                        $mon_name = $sonuc['money_name'];
                                        echo "<option value=".$id.">".$mon_name."</option>";   
                                    /* 
                                        <option value="1"><?=$mon_name;?></option> */

                                }                        
                                     ?> 
                                       
                                </select>
                                
                                <?php
                                    }
                                    ?>                   
                                </td>   
                                </tr>    
                                
                                    <tr><td>Harcama</td>
                                    <td><input type="text" name="port_ex" class="form-control" value="<?php echo $sonuc['harc_deger'];?>"></td>
                                    </tr>
                                    <tr><td></td>
                                    <td><input type="submit" class="btn btn-primary" value="Güncelle" id="ulasim_duzenle"></td>
                                    </tr>
                                </table>
                            </form>
                            
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                    </div>
                </div>
                </div>


                

                



              

            
            
             

               
        </div>
</div>





</body>
</html>