<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");


$UrunHizmetGetir_SQL="SELECT *  FROM  `tbl_hizmetler` ORDER BY ID DESC";
$UrunHizmetMusteriler=mysql_query($UrunHizmetGetir_SQL);
?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
          <h2 class="sub-header">Yeni Müşteri Ekleyin</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Müşteri Bilgilerini Giriniz</h3>
            </div>
            
            <div class="panel-body">
            <?php 
			if($_POST[Olay] == "YeniMusteri"){
			$MusteriEkle_SQL = "
			INSERT INTO `tbl_musteriler` (
			`ID` ,
			`SirketAdi` ,
			`SirketSorumlusu` ,
			`SirketWebAdresi` ,
			`SirketSorumluEposta` ,
			`SirketEposta` ,
			`SirketAdres` ,
			`SirketTel1` ,
			`SirketTel2` ,
			`SistemeEklendi`
			)
			VALUES (
			NULL ,  '$_POST[SirketAdi]',  '$_POST[YetkiliAdSoyad]',  '$_POST[WebAdresi]',  '$_POST[YetkiliEposta]',  '$_POST[SirketEposta]',  '$_POST[SirketAdres]',  '$_POST[Telefon1]',  '$_POST[Telefon2]', 
			CURRENT_TIMESTAMP
			);			
			";
			if(mysql_query($MusteriEkle_SQL)){
			?>
            <div class="alert alert-success">
                <strong>Kayıt İşlemi Başarılı!</strong> <?php echo $_POST[SirketAdi]?> adlı yeni bir müşteri eklendi.
                
            </div> 
            <?php }
			else { ?>     
            <div class="alert alert-danger">
                <strong>Kayıt İşlemi Başarısız!</strong> <?php echo mysql_error();?>
            </div>            
            <?php }//sorgu kontrol 
			}//post kontrol ?>      
            <div class="col-xs-12 col-sm-10 col-md-8">
            <form action="musteri-ekle.php" method="post" enctype="multipart/form-data" name="YeniMusteri" class="form">
            <a class="btn btn-sm btn-info" href="musteri-gor.php">Tüm Müşterileri Görün</a> 
            <a class="btn btn-sm btn-danger" href="musteri-gor.php">Vazgeçin</a> 
            
            <hr>
            <input name="Olay" type="hidden" value="YeniMusteri">
            
            <label for="SirketAdi">* Şirket Adı</label>
            <input type="text" name="SirketAdi" id="SirketAdi" class="form-control" placeholder="Şirket Adını Giriniz" required autofocus value="<?php echo $_POST[SirketAdi]?>">
            
            <label for="YetkiliAdSoyad">* Şirket Yetkilisi (Ad-Soyad)</label>
            <input type="text" name="YetkiliAdSoyad" id="YetkiliAdSoyad"  class="form-control" placeholder="Şirket Yetkilisi Adı ve Soyadını Giriniz" required value="<?php echo $_POST[YetkiliAdSoyad]?>">

			<label for="WebAdresi">Şirket Web Adresi</label>
            <input type="text" name="WebAdresi" id="WebAdresi"  class="form-control" placeholder="Şirketin web adresini giriniz" value="<?php echo $_POST[WebAdresi]?>">
            
            <label for="YetkiliEposta">* Yetkili Kişi E-Posta Adresi</label>
            <input type="email" name="YetkiliEposta" id="YetkiliEposta"  class="form-control" placeholder="Şirket Yekilisinin E-Postası" required value="<?php echo $_POST[YetkiliEposta]?>">
            
            <label for="SirketEposta">Şirket E-Posta Adresi</label>
            <input type="email" name="SirketEposta" id="SirketEposta"  class="form-control" placeholder="Şirket E-Postası"  value="<?php echo $_POST[SirketEposta]?>">
            
            <label for="SirketAdres">Şirket Adresi</label>
            <textarea name="SirketAdres" class="form-control" id="SirketAdres" placeholder="Şirket Adresini Giriniz"><?php echo $_POST[SirketAdres]?></textarea>
            
            <label for="Telefon1">Telefon No.</label>
            <input type="number" name="Telefon1" id="Telefon1"  class="form-control" placeholder="Telefonu" required value="<?php echo $_POST[Telefon1]?>">
            
            <label for="Telefon2">Telefon No.</label>
            <input type="number" name="Telefon2" id="Telefon2"  class="form-control" placeholder="Telefonu" value="<?php echo $_POST[Telefon2]?>">
            

            <input name="" type="submit" value="Ekleyin" class="btn btn-sm btn-success"> 
            
            <a class="btn btn-sm btn-danger" href="musteri-gor.php">Vazgeçin</a> 
			</form>
            </div>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
        
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
    </div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
