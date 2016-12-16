<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");

/*
TODO



*/
$ArananHizmet_SQL="SELECT * FROM  `tbl_hizmetler` WHERE  `ID` ='$_POST[HangiHizmet]'";
$ArananHizmet_Bilgi=mysql_fetch_array(mysql_query($ArananHizmet_SQL));


$UrunHizmetGetir_SQL="
SELECT * 
FROM  `tbl_isler` ,  `tbl_hizmetler` 
WHERE  `tbl_isler`.`HizmetID` =  '$_POST[HangiHizmet] '
AND  `tbl_hizmetler`.`ID` =  `tbl_isler`.`HizmetID` 
ORDER BY  `tbl_isler`.`MusteriID` ASC 
";
$UrunHizmetMusteriler=mysql_query($UrunHizmetGetir_SQL);

/*
<?php echo $ArananMusteri_Bilgi[ID]; ?>
<?php echo $ArananMusteri_Bilgi[SirketAdi]; ?>
<?php echo $ArananMusteri_Bilgi[SirketSorumlusu]; ?>
<?php echo $ArananMusteri_Bilgi[SirketWebAdresi]; ?>
<?php echo $ArananMusteri_Bilgi[SirketSorumluEposta]; ?>
<?php echo $ArananMusteri_Bilgi[SirketEposta]; ?>
<?php echo $ArananMusteri_Bilgi[SirketAdres]; ?>
<?php echo $ArananMusteri_Bilgi[SirketTel1]; ?>
<?php echo $ArananMusteri_Bilgi[SirketTel2]; ?>
<?php echo $ArananMusteri_Bilgi[SistemeEklendi]; ?>
*/
?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
          <h2 class="sub-header">Ürün / Hizmet Detayı</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $ArananHizmet_Bilgi[HizmetAdi]?></h3>
            </div>
            
            <div class="panel-body">

      <?php 
			if($_POST[Olay] == "Guncelle"){
			$SQL_Guncelle= "
				UPDATE `tbl_hizmetler` SET  
				`HizmetAdi` =  '$_POST[HizmetAdi]',
				`HizmetOzet` =  '$_POST[HizmetOzet]',
				`HizmetDetay` =  '$_POST[HizmetDetay]' 
				WHERE `tbl_hizmetler`.`ID` = $_POST[HangiHizmet]"
				;
			if(mysql_query($SQL_Guncelle)){
			?>
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>&nbsp;<strong>Güncelleme İşlemi Başarılı!</strong> 
                <div class="clearfix"></div>
                <form action="hizmet-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiHizmet" type="hidden" value="<?php echo $_POST[HangiHizmet]?>">
                    <input name="" type="submit" class="btn btn-sm btn-warning" value="Yenileyin" style="margin-right:2px;"> 
                </form>                 
				<div class="clearfix"></div>
            </div> 
            <?php }
			else { ?>     
            <div class="alert alert-danger">
                <strong>Güncelleme İşlemi Başarısız!</strong> <?php echo mysql_error();?>
            </div>            
            <?php }//sorgu kontrol 
			}//post kontrol ?>   

<div class="col-xs-11 col-sm-11 col-lg-11" style="margin-left:0; padding-left:0;">
    <a class="btn btn-sm btn-primary" href="hizmet-ekle.php">Yeni Ürün / Hizmetler Ekleyin</a>
    <a class="btn btn-sm btn-info" href="hizmet-gor.php"><img src="assets/images/icons/gear32.png" width="16" height="16">&nbsp;Tüm Hizmetleri Görün</a>
    <a class="btn btn-sm btn-info" href="musteri-gor.php"><img src="assets/images/icons/user32.png" width="16" height="16">&nbsp;Tüm Müşterileri Görün</a>
    <a class="btn btn-sm btn-info" href="tum-isler.php"><img src="assets/images/icons/linedpaperpencil32.png" width="16" height="16">&nbsp;Tüm İşleri Görün</a>
</div>       

<div class="col-xs-1 col-sm-1 col-lg-1" style="margin-left:0; padding-left:0;">
    <form action="hizmet-gor.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left" >
        <input name="SilinecekHizmet" type="hidden" value="<?php echo $ArananHizmet_Bilgi[ID]?>">
        <input name="" type="submit" class="btn btn-sm btn-danger" value="Silin" style="margin-right:2px;" onClick="return confirm('Bu işlemi geri alamazsınız, silmeye devam edelim mi?')"> 
    </form>                    
</div>

<br>
<div class="clearfix"></div>
	 <div class="table-responsive">
                 
       <form action="hizmet-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" >
                    <input name="HangiHizmet" type="hidden" value="<?php echo $ArananHizmet_Bilgi[ID]?>">
                    <input name="Olay" type="hidden" value="Guncelle">
                    <input name="" type="submit" class="btn btn-sm btn-success" value="Güncelleyin" style="margin:2px 2px 2px 0;"> 

         			<div class="clearfix"></div>
<table border="0" class="table table-striped">

  <tr>
    <th align="right" valign="middle" scope="row">* Hizmet Adı</th>
    <td>:</td>
    <td><input type="text" name="HizmetAdi" id="HizmetAdi" class="form-control" placeholder="Hizmet Adını Giriniz" required value="<?php echo $ArananHizmet_Bilgi[HizmetAdi]; ?>"></td>
</td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">Hizmet Özeti</th>
    <td>:</td>
    <td><textarea name="HizmetOzet" class="form-control" id="HizmetDetay" placeholder="Hizmet Özetini Giriniz"><?php echo $ArananHizmet_Bilgi[HizmetOzet]; ?></textarea></td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">Hizmet Detayı</th>
    <td>:</td>
    <td><textarea name="HizmetDetay" rows="5" class="form-control" id="HizmetDetay" placeholder="Hizmet Detayını Giriniz"><?php echo $ArananHizmet_Bilgi[HizmetDetay]; ?></textarea></td>
  </tr>



</table>
<input name="" type="submit" class="btn btn-sm btn-success" value="Güncelleyin" style="margin:2px 2px 2px 0;"> 
                </form>
  
          </div>           
           
			
          </div>
        </div>


          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><strong><?php echo $ArananHizmet_Bilgi[HizmetAdi]; ?></strong> adlı hizmetin sunulduğu şirketler</h3>
            </div>        
            <div class="panel-body">
			<p class="">(<?php echo $HizmetSayisi = mysql_num_rows($UrunHizmetMusteriler);?> adet kayıt var)</p>            
            
              <form action="is-ekle.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiHizmet" type="hidden" value="<?php echo $ArananHizmet_Bilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-sm btn-primary" value="Müşteriye Ekleyin"  style="margin-right:2px;"> 
                    </form>            
            <a class="btn btn-sm btn-info" href="musteri-gor.php">Tüm Müşterileri Görün</a>
            <a class="btn btn-sm btn-info" href="hizmet-gor.php">Tüm Hizmetleri Görün</a>
	        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Şirket</th>
                  <th>Miktarı</th>
                  <th>Fatura Bedeli</th>
                  <th>İş Tarihi</th>
                  <th>Sisteme Eklendi</th>
                   <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
<?php
while($UrunHizmetBilgi = mysql_fetch_array($UrunHizmetMusteriler))
{ 

$hangiSirket_SQL = "SELECT ID,SirketAdi FROM  `tbl_musteriler`  WHERE  `ID` ='".$UrunHizmetBilgi[MusteriID]."'";
$hangiSirket_Veri=mysql_fetch_array(mysql_query($hangiSirket_SQL));


?>
				<tr>
             	 <td>
              <form action="musteri-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiSirket" type="hidden" value="<?php echo $hangiSirket_Veri[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-info" value="<?php echo $hangiSirket_Veri[SirketAdi]?>" style="margin-right:2px;"> 
                    </form>
                    				 
				 </td>
                  <td><?php echo $UrunHizmetBilgi[IsMiktari];$TOplamIsMikteri+=$UrunHizmetBilgi[IsMiktari]?></td>
                  <td><?php echo $UrunHizmetBilgi[IsTutari];$ToplamTutar+=$UrunHizmetBilgi[IsTutari]?></td>
                  <td><?php echo $UrunHizmetBilgi[IsTarihi]?></td>
                  <td><?php echo $UrunHizmetBilgi[SistemeEklendi]?></td>
                  <td>


                    
              <form action="is-detaylari.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="Hangi_Hizmet" type="hidden" value="<?php echo $UrunHizmetBilgi[ID]?>">
                    <input name="Hangi_Musteri" type="hidden" value="<?php echo $hangiSirket_Veri[ID]?>">
                    <input name="Hangi_is" type="hidden" value="<?php echo $UrunHizmetBilgi[IsID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-info" value="İş Detayları" style="margin-right:2px;" title="Bu işin bilgilerini günceleyin"> 
                    </form>
                    
        <!--      <form action="musteri-sil.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiSirket" type="hidden" value="<?php echo $UrunHizmetBilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-danger" value="Silin" style="margin-right:2px;"> 
                    </form>-->
                
                </td>
                </tr>
			<?php }	?>                    
            <tr>
            	<td><strong>Toplam </strong></td>
                <td><strong><?php echo $TOplamIsMikteri?> Adet</strong></td>
                <td><strong><?php echo $ToplamTutar?> TL</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>                                    
              </tbody>
            </table>
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
