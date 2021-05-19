$(document).ready(function () {

    $('#btncu').click(function () {

        $.ajax({
            method: "POST",
            url: "ajax.php?type=index.php",
            data: $('#baslik_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    swal("Boş Bırakılmış Alan!","","error");
                }
                else if(msg == "ok")
                {
                    swal("Giriş Başarılı","","success");
                    location.href = "kategoriler.php";
                    
                }
                else if(msg == "hata")
                {
                    swal("Hatalı giriş!","","error");
                }
                
            });

    });

    // KULLANICI BİLGİLERİNİ GÜNCELLİYOR
    $('#guncel_btn').click(function () {
       

        $.ajax({
            method: "POST",
            url: "ajax.php?type=kisi_duzenle.php",
            data: $('#guncel_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    swal("Boş Bırakılmış Alan!","","error");
                }
                else if(msg == "ok")
                {
                    swal("Bilgiler Başarıyla Güncellendi","","success");
                    location.href = "kullanici_bilgileri.php";

                }
                else if(msg == "hata")
                {
                    swal("Güncellenmede Sorun Oluştu!","","error");
                }
                
            })
            ;

    });


    ///HESAP EKLEME VERİLERİNİ ÇEKİYOR
    $('#kaydet_btn').click(function () {

        $.ajax({
            method: "POST",
            url: "ajax.php?type=hesap_ekle.php",
            data: $('#hesap_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    sweetAlert("Boş Bırakılmış Alan!","","error");
                }
                else if(msg == "ok")
                {
                    sweetAlert(" Başarıyla Eklendi","","success");
                    location.href = "hesap_islemleri.php";
                   
                }
                else if(msg == "hata")
                {
                    sweetAlert("Hesap Eklenemedi","Sorun Oluştu!","error");
                }
                
            });

    });

    $('#hesap_duzenle').click(function () {

        $.ajax({
            method: "POST",
            url: "ajax.php?type=hesap_duzenle.php",
            data: $('#duzenle_hesap').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    sweetAlert("Boş Bırakılmış Alan!","","error");
                }
                else if(msg == "ok")
                {
                    sweetAlert("Başarılı!","Başarıyla Güncellendi","success");
                    location.href = "hesap_islemleri.php";

                   
                }
                else if(msg == "hata")
                {
                    sweetAlert("Güncelleme Gerçekleşmedi","Sorun Oluştu!","error");
                }
                
            });

    });

///KATEGORİ GÜNCELLE
    $('#ulasim_duzenle').click(function () {

        $.ajax({
            method: "POST",
            url: "ajax.php?type=kategoriler.php&id=1",
            data: $('#ulasim_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    sweetAlert("Boş Harcama!","Harcama Girilmedi!","error");
                }
                else if(msg == "ok")
                {
                    sweetAlert("Başarılı!","Harcama Eklendi!","success");
                    location.href = "kategoriler.php";
                   
                }
                else if(msg == "hata")
                {
                    sweetAlert("Harcama Gerçekleşmedi","Sorun Oluştu!","error");
                }
                
            });

    });


    $('#ulasim_duzenle').click(function () {

        $.ajax({
            method: "POST",
            url: "ajax.php?type=kategoriler.php&id=2",
            data: $('#ulasim_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    sweetAlert("Boş Harcama!","Harcama Girilmedi!","error");
                }
                else if(msg == "ok")
                {
                    sweetAlert("Başarılı!","Harcama Eklendi!","success");
                    location.href = "kategoriler.php";
                   
                }
                else if(msg == "hata")
                {
                    sweetAlert("Harcama Gerçekleşmedi","Sorun Oluştu!","error");
                }
                
            });

    });


 

    
    
    
    
 
});
