<?php
require_once('baglan.php');
//var_dump($_GET,$_POST);

if($_GET['type'] == 'index.php')
{
    $kadi= $_POST['kadi'];
    $sifre = $_POST['sifre'];
    //$sifrele = sha1(md5($sifre));
    if(!$kadi || !$sifre)
    {
        echo "bos";
    }
    else
    {
        $girisyap = $db ->prepare("SELECT * FROM user WHERE u_name =:kadi AND u_pass=:sifre");
        $girisyap->bindParam('kadi', $kadi, PDO::PARAM_STR);
        $girisyap->bindValue('sifre', $sifre, PDO::PARAM_STR);
        $girisyap->execute();
        $count = $girisyap->rowCount();
        $row  = $girisyap->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row))
        {
            /*$row = $girisyap ->fetchAll(\PDO::FETCH_ASSOC);
                        
            $_SESSION['u_name'] = $row->u_name;
            $_POST = array();*/
            $_SESSION['user_id']  = $row['id'];
            

            echo "ok";
        }
        else
        {
            echo 'hata';
        } 
        
    }
}

else if($_GET['type'] == 'kisi_duzenle.php')
{   
    $id=$_POST['id'];
    $u_name=$_POST['u_name'];
    $u_pass=$_POST['u_pass'];
    $u_mail=$_POST['u_mail'];
    if(!$id || !$u_name|| !$u_pass|| !$u_mail)
    {
        echo "bos";
    }

    else
    {

        $sorgu = $db->prepare("UPDATE user SET u_name = ?, u_pass = ?, u_mail= ? WHERE id = ?");
        $sorgu->bindParam(1, $u_name);
        $sorgu->bindParam(2, $u_pass);
        $sorgu->bindParam(3, $u_mail);
        $sorgu->bindParam(4, $id);
        if($sorgu->execute())
        {
            echo "ok";
        }
        else
        {
            echo "hata";

        }
       

    }


}

else if($_GET['type'] == 'hesap_ekle.php')
{   
    $acc_type=$_POST['acc_type'];
    $mon_type=$_POST['mon_type'];
    $mon_value=$_POST['mon_value'];
    if(!$acc_type|| !$mon_type|| !$mon_value)
    {
        echo "bos";
    }

    else
    {

        $sorgu = $db->prepare("INSERT INTO account(acc_type,mon_type,mon_value,user_id) VALUES(?,?,?,?)");
        //$ekle ->execute(':acc_type'=>$acc_type,':mon_type'=>$u_pass,':mon_type'=>$mon_type,':mon_value'=>$mon_value);
   // acc_type =:acc_type, mon_type =:mon_type, mon_value =:mon_value)
        $sorgu->bindParam(1, $acc_type, PDO::PARAM_INT);
        $sorgu->bindParam(2, $mon_type, PDO::PARAM_INT);
        $sorgu->bindParam(3, $mon_value, PDO::PARAM_INT);
        $sorgu->bindParam(4, $_SESSION['user_id']);
       // $sorgu->execute();
        
       /* $ekle->bindParam('acc_type', $acc_type, PDO::PARAM_INT);
        $ekle->bindValue('mon_type', $mon_type, PDO::PARAM_INT);
        $ekle->bindValue('mon_value', $mon_value, PDO::PARAM_INT);
        $ekle->execute();*/
                
        if($sorgu->execute())
        {
            echo "ok";
        }
        else
        {
            echo "hata";

        }
       

    }
}


else if($_GET['type'] == 'hesap_duzenle.php')
{   
    $id = $_POST['id'];
    $acc_type=$_POST['acc_type'];
    $mon_type=$_POST['mon_type'];
    $mon_value=$_POST['mon_value'];
    if(!$acc_type|| !$mon_type|| !$mon_value|| !$id)
    {
        echo "bos";
    }

    else
    {

        $sorgu = $db->prepare("UPDATE account SET acc_type = ?, mon_type = ?, mon_value= ? WHERE id = ?");
        $sorgu->bindParam(1, $acc_type);
        $sorgu->bindParam(2, $mon_type);
        $sorgu->bindParam(3, $mon_value);
        $sorgu->bindParam(4, $id);
        if($sorgu->execute())
        {
            echo "ok";
        }
        else
        {
            echo "hata";

        }
       

    }   


}


else if($_GET['type'] == 'kategoriler.php')
{   
    $port_ex=$_POST['port_ex'];
    $id=$_GET['id'];
    $acc_type=$_POST['acc_type'];
    $mon_type= $_POST['mon_type'];
    
    $sorgu = $db->prepare("insert into harcama (user_id,m_id,a_id,type,harc_deger) values (?,?,?,?,?)");
    $sorgu->bindParam(1, $_SESSION['user_id']);
    $sorgu->bindParam(2, $mon_type);
    $sorgu->bindParam(3, $acc_type);
    $sorgu->bindParam(4, $id);
    $sorgu->bindParam(5, $port_ex);
    if($sorgu->execute())
    {
        echo "ok";
    }
    else
    {
        echo "hata";

    }
      


}


 

?>