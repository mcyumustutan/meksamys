<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");

$MusterileriGetir_SQL="SELECT *  FROM  `tbl_musteriler` ORDER BY ID DESC";
$GelenMusteriler=mysql_query($MusterileriGetir_SQL);

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
          <h2 class="sub-header">İş Ekleyin</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Bir İş Ekleyin</h3>
            </div>
            
            <div class="panel-body">

			<!-- col-xs telefon için col-sm tablet için col md desktop için-->
			<div class="col-xs-12 col-sm-10 col-md-8">
            <?php 
			if($_POST[Olay] == "YeniIsEkle"){
			$MusteriEkle_SQL = "
				INSERT INTO `tbl_isler` (
				`IsID` ,
				`MusteriID` ,
				`HizmetID` ,
				`IsMiktari` ,
				`IsTutari` ,
				`IsDetay` ,
				`IsTarihi` ,
				`SistemeEklendi`
				)
				VALUES (
				NULL ,  '$_POST[Sirket]',  '$_POST[Is]',  '$_POST[Miktar]',  '$_POST[Fatura]', '$_POST[Detay]',  '$_POST[IsTarihi]', 
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


            
            <form action="is-ekle.php" method="post" enctype="multipart/form-data" name="YeniMusteri" class="form" >
            <a class="btn btn-sm btn-primary" href="musteri-gor.php">Müşterilere Dönün</a> <a class="btn btn-sm btn-primary" href="hizmet-gor.php">Hizmetlere Dönün</a> <a class="btn btn-sm btn-danger" href="musteri-gor.php">Vazgeçin</a> <hr>
            <input name="Olay" type="hidden" value="YeniIsEkle">
            
            <label for="Sirket">* Şirket Adı</label>
			<select name="Sirket" id="Sirket"  class="form-control" required>
				<option value="0">Seçiniz</option>
				<?php
                while($MusterilerBilgi = mysql_fetch_array($GelenMusteriler))
                { ?>
                	<option <?php if($_POST[HangiSirket] == $MusterilerBilgi[ID]) echo 'selected'?> value="<?php echo $MusterilerBilgi[ID]?>"><?php echo $MusterilerBilgi[SirketAdi]?></option>
                <?php }	?>                               

            </select>
            
            <label for="Is">* Ürün / Hizmet Seçiniz</label>
			<select name="Is" id="Is"  class="form-control" required>				
				<?php
                while($UrunHizmetBilgi = mysql_fetch_array($UrunHizmetMusteriler))
                { ?>
                	<option <?php if($_POST[HangiHizmet] == $UrunHizmetBilgi[ID]) echo 'selected'?> value="<?php echo $UrunHizmetBilgi[ID]?>"><?php echo $UrunHizmetBilgi[HizmetAdi]?></option>
                <?php }	?>                               

            </select>            
            
            <div class="col-xs-4 col-sm-4 col-md-offset-0" style="margin-left:0; padding-left:0;">
            <label for="IsTarihi">* İş Tarihi</label>
            <input type="date" name="IsTarihi" id="IsTarihi" placeholder="İş Tarihi" required   class="form-control" value="<?php echo $_POST[IsTarihi]?>">
            </div>
            <div class="clearfix"></div>
            
      
            <label for="Miktar">Miktar</label>
            <input type="number" name="Miktar" id="Miktar"  class="form-control" placeholder="Miktar" value="<?php echo $_POST[Miktar]?>">

            
            <label for="Fatura">Fatura Bedeli</label>
            <input type="number" name="Fatura" id="Fatura" class="form-control" placeholder="Fatura Bedelini yazınız" value="<?php echo $_POST[Fatura]?>">

            
            <label for="Detay">Detay</label>
            <textarea name="Detay" id="Detay" class="form-control" placeholder="Detayları yazınız"><?php echo $_POST[Detay]?></textarea>
            
            <input name="" type="submit" value="Ekleyin" class="btn btn-sm btn-success"> <input  class="btn btn-sm btn-danger" name="" type="reset" value="Vazgeçin">
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
