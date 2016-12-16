<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");
?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
          <h2 class="sub-header">Yeni Ürün / Hizmet Ekleyin</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Ürün / Hizmet Bilgilerini Giriniz</h3>
            </div>
            
            <div class="panel-body">

            <?php 
			if($_POST[Olay] == "YeniHizmet"){
			$MusteriEkle_SQL = "
			INSERT INTO  `tbl_hizmetler` (
			`ID` ,
			`HizmetAdi` ,
			`HizmetOzet` ,
			`HizmetDetay` ,
			`SistemeKayit`
			)
			VALUES (
			NULL ,  '$_POST[HizmetAdi]',  '$_POST[HizmetOzet]',  '$_POST[HizmetDetay]' ,
			CURRENT_TIMESTAMP
			);
			";
			if(mysql_query($MusteriEkle_SQL)){
			?>
            <div class="alert alert-success">
                <strong>Kayıt İşlemi Başarılı!</strong>
            </div> 
            <?php }
			else { ?>     
            <div class="alert alert-danger">
                <strong>Kayıt İşlemi Başarısız!</strong> <?php echo mysql_error();?>
            </div>            
            <?php }//sorgu kontrol 
			}//post kontrol ?>      

            <div class="col-xs-12 col-sm-10 col-md-8">
            <form action="hizmet-ekle.php" method="post" enctype="multipart/form-data" name="YeniMusteri" class="form">
            <a class="btn btn-sm btn-info" href="hizmet-gor.php">Tüm Ürün/Hizmetler</a>
            <a class="btn btn-sm btn-danger" href="hizmet-gor.php">Vazgeçin</a>
			<div class="clearfix"></div>
			<br>
            
            <input name="Olay" type="hidden" value="YeniHizmet">
            <label for="HizmetAdi">* Hizmet Adı</label>
            <input type="text" name="HizmetAdi" id="HizmetAdi" class="form-control" placeholder="Hizmet Adını Giriniz" required autofocus>
            
            <label for="HizmetOzet">Hizmet Özeti</label>
            <textarea name="HizmetOzet" class="form-control" id="HizmetDetay" placeholder="Hizmet Özetini Giriniz"></textarea>
            
            <label for="HizmetDetay">Hizmet Detayı</label>
            <textarea name="HizmetDetay" rows="5" class="form-control" id="HizmetDetay" placeholder="Hizmet Detayını Giriniz"></textarea>
            
            <input name="" type="submit" value="Ekleyin" class="btn btn-sm btn-success"> 
            <a class="btn btn-sm btn-danger" href="hizmet-gor.php">Vazgeçin</a>
            
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
