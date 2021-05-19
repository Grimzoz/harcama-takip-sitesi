<?php
error_reporting(0);
require_once("baglan.php");
include('kullanici_bilgileri');



?>
<html>
<head>
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
   

</head>

<body>


<div style="position: absolute;width: 100%;left: 0; font-size: 18px; margin-left:0px; float: left;">
        <div class="row mt-5">
            <?php if(is_null( $_SESSION['user_id']))
            {
                header('Location: index.php');
                //"SELECT * FROM account WHERE id=".(int)$_GET['id']
            }
            require_once('menu.php');
            $sorgu =$db->prepare("SELECT account.id, account_type.acc_name,money_type.money_name,account.mon_value FROM account 
            INNER JOIN account_type ON account.acc_type = account_type.id
            INNER JOIN money_type ON account.mon_type = money_type.id WHERE account.id=".(int)$_GET['id']);
            $sorgu->execute();
            $count = $sorgu->rowCount();
            //if ($sorgu->rowCount() > 0)
            $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);

            ?>
            
            <div class="col-9  " id="yerles">
                
                    <div class="card bg-dark ">
                        <div class="card-header bg-dark text-white">
                            Hesabını Güncelle
                        </div>
                        
                        <div class="card-body text-white">
                        <form action="#" method="post" id="duzenle_hesap" onsubmit="return false;">
                            <table class="table text-white">
                                <tr><td>No</td>
                                <td><input type="text" name="id" class="form-control" value="<?php echo $sonuc['id'];?>">
                                </td>   
                                </tr>
                                <tr><td>Miktar</td>
                                <td><input type="text" name="mon_value" class="form-control" value="<?php echo $sonuc['mon_value'];?>">
                                </tr>
                                <tr><td>Hesap Türü</td>
                                <td>
                                    <div class="radio form-check text-white">
                                    <label><input type="radio" name="acc_type" id="acc_type" value="1" checked>Nakit</label>
                                    </div>
                                    <div class="radio form-check text-white">
                                    <label><input type="radio" name="acc_type"  id="acc_type" value="2">Kart</label>
                                </div>
                                
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
                                
                                <tr><td></td>
                                <td><input type="submit" class="btn btn-primary" value="Güncelle" id="hesap_duzenle" on_click="kerim();"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
             </div>
                        </div>
                    </div>
            </div>
        </div>
</div>


        







</body>











</html>