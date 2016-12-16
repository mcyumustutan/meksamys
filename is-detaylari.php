<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");

$ArananMusteri_SQL="
SELECT  
	tbl_hizmetler.ID, tbl_hizmetler.HizmetAdi, 
	tbl_musteriler.ID, tbl_musteriler.SirketAdi, 
	tbl_isler.IsID,tbl_isler.MusteriID, tbl_isler.HizmetID, tbl_isler.IsMiktari, tbl_isler.IsTutari, tbl_isler.IsDetay, tbl_isler.IsTarihi ,tbl_isler.SistemeEklendi 
FROM 
	tbl_musteriler, 
	tbl_hizmetler, 
	tbl_isler 
WHERE 
	tbl_musteriler.ID = $_POST[Hangi_Musteri] 
AND 
	tbl_hizmetler.ID = $_POST[Hangi_Hizmet] 
AND 
	tbl_isler.IsID = $_POST[Hangi_is] 

	";	
	
$ArananMusteri_Bilgi=mysql_fetch_array(mysql_query($ArananMusteri_SQL));

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
          <h2 class="sub-header">İş Detayı</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
				<?php echo $ArananMusteri_Bilgi[SirketAdi]; ?> - <?php echo $ArananMusteri_Bilgi[HizmetAdi]; ?>
               <div class="clearfix"></div>
               </h3>
            </div>
            
            <div class="panel-body">
            
<?php 
			if($_POST[Olay] == "Guncelle"){
			$SQL_Guncelle= "
			UPDATE  `tbl_isler` SET  
			`IsMiktari` =  '$_POST[Miktar]',
			`IsTutari` =  '$_POST[Fatura]',
			`IsDetay` =  '$_POST[Detay]' ,
			`IsTarihi` =  '$_POST[IsTarihi]' 
			WHERE  `tbl_isler`.`IsID` =$_POST[Hangi_is];
		";
			if(mysql_query($SQL_Guncelle)){
			?>
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>&nbsp;<strong>Güncelleme İşlemi Başarılı!</strong> 
                <div class="clearfix"></div>
                <form action="is-detaylari.php" method="post" enctype="multipart/form-data" name="" class="form" style="float:left">
                    <input name="HangiHizmet" type="hidden" value="<?php echo $_POST[Guncellenen_is]?>">
                    <input name="Hangi_Hizmet" type="hidden" value="<?php echo $_POST[Hangi_Hizmet]?>">
                    <input name="Hangi_Musteri" type="hidden" value="<?php echo $_POST[Hangi_Musteri]?>">
                    <input name="Hangi_is" type="hidden" value="<?php echo $_POST[Hangi_is]?>">
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
            <a class="btn btn-sm btn-info" href="musteri-gor.php"><img src="assets/images/icons/user32.png" width="16" height="16">&nbsp;Tüm Müşterileri Görün</a>
            <a class="btn btn-sm btn-info" href="hizmet-gor.php"><img src="assets/images/icons/gear32.png" width="16" height="16">&nbsp;Tüm Hizmetleri Görün</a>
            <a class="btn btn-sm btn-info" href="tum-isler.php"><img src="assets/images/icons/linedpaperpencil32.png" width="16" height="16">&nbsp;Tüm İşleri Görün</a>
</div>

<div class="col-xs-1 col-sm-1 col-lg-1" style="margin-left:0; padding-left:0;">

                 <form action="tum-isler.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left" >
                <input name="Silinecek_is" type="hidden" value="<?php echo $ArananMusteri_Bilgi[IsID]; ?>">
                <input name="" type="submit" class="btn btn-sm btn-danger" value="Silin" style="margin-right:2px;" onClick="return confirm('Bu işlemi geri alamazsınız, silmeye devam edelim mi?')"> 
            </form>          

</div>
           
   
           
            

<div class="clearfix"></div>
	 <div class="table-responsive">
<form action="is-detaylari.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" >
<input name="Guncellenen_is" type="hidden" value="<?php echo $ArananMusteri_Bilgi[ID]?>">
<input name="" type="submit" class="btn btn-sm btn-success" value="Güncelleyin" style="margin:2px 2px 2px 0;"> 
 <input name="Olay" type="hidden" value="Guncelle">

<input name="Hangi_Hizmet" type="hidden" value="<?php echo $_POST[Hangi_Hizmet]?>">
<input name="Hangi_Musteri" type="hidden" value="<?php echo $_POST[Hangi_Musteri]?>">
<input name="Hangi_is" type="hidden" value="<?php echo $_POST[Hangi_is]?>">
 
<table border="0" class="table table-striped">

  <tr>
    <th align="right" valign="middle" scope="row">Şirket Adı</th>
    <td>:</td>
    <td><?php echo $ArananMusteri_Bilgi[SirketAdi]; ?> 
</form>		</td>
</td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">Hizmet Adı</th>
    <td>:</td>
    <td>
<form action="hizmet-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
<input name="HangiHizmet" type="hidden" value="<?php echo $ArananMusteri_Bilgi[HizmetID]; ?>">
<img src="assets/images/icons/leftturnarrow32.png" width="22" height="22"><input name="" type="submit" class="btn btn-xs btn-info" value="<?php echo $ArananMusteri_Bilgi[HizmetAdi]; ?>" style="margin-right:2px;"> 
</form>
	 </td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">İş Miktarı</th>
    <td>:</td>
    <td><input type="number" name="Miktar" id="Miktar"  class="form-control" placeholder="Miktar" value="<?php echo $ArananMusteri_Bilgi[IsMiktari]; ?>"></td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">İş Tutarı</th>
    <td>:</td>
    <td><input type="number" name="Fatura" id="Fatura" class="form-control" placeholder="Fatura Bedelini yazınız" value="<?php echo $ArananMusteri_Bilgi[IsTutari]; ?>" required></td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">Detaylar</th>
    <td>:</td>
    <td><textarea name="Detay" id="Detay" class="form-control" placeholder="Detayları yazınız"><?php echo $ArananMusteri_Bilgi[IsDetay]; ?></textarea></td>
  </tr>
  <tr>
    <th align="right" valign="middle" scope="row">İş Tarihi</th>
    <td>:</td>
    <td><div class="col-xs-4 col-sm-4" style="margin:0; padding:0;"><input type="date" name="IsTarihi" id="IsTarihi" placeholder="İş Tarihi" required   class="form-control" value="<?php echo $ArananMusteri_Bilgi[IsTarihi]; ?>"></div></td>
  </tr>
 

</table>
<input name="" type="submit" class="btn btn-sm btn-success" value="Güncelleyin" style="margin:2px 2px 2px 0;"> 
</form>
     
  
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
