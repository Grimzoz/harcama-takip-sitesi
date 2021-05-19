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
            <div class="col-7 ml-5" id="yerles">
                <div class="col-7" id="yerles">
                    <div class="card bg-dark ">
                        <div class="card-header bg-dark text-white">
                            Hesap Ekle
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" id="hesap_form" onsubmit="return false;">            
                                <div class=" input-group input-group-lg text-white">
                                <span class="inputGroup-sizing-lg">MİKTAR</span>
                                <input type="text"  name="mon_value" id="mon_value" class="form-control ml-1" ">
                                <span class="inputGroup-sizing-lg text-white"><i class="fa fa-money fa-lg" ></i></span>
                                </div>
                                                       
                               
                                <select class="form-select form-select-lg mt-3 ml-0 col-12" name="mon_type" id="mon_type" aria-label=".form-select-lg example ">
                                
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
                                
                                <div class="radio form-check text-white">
                                    <label><input type="radio" name="acc_type" id="acc_type" value="1" checked>Nakit</label>
                                    </div>
                                    <div class="radio form-check text-white">
                                    <label><input type="radio" name="acc_type"  id="acc_type" value="2">Kart</label>
                                </div>

                               
                                <button type="button" class="btn btn-success btn-lg col-12 mt-2 " id="kaydet_btn">Kaydet</button>
                 
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 
    </div>

</div>




</body>
</html>