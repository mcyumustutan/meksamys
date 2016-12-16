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
          <h2 class="sub-header">Fihrist v0.2</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Adres ve Telefon Defteri</h3>
            </div>
            
            <div class="panel-body">

     <table class="table table-striped">
              <thead>
                <tr>
                    <th>Adı-Soyad</th>
                    <th>E-Posta</th>
                    <th>Telefon 1</th>
                    <th>Telefon 2</th>
                    <th>Detaylar</th>
                </tr>
              </thead>
              <tbody>
<?php
$MusterileriGetir_SQL="SELECT  `ID` ,`SirketSorumlusu` ,  `SirketSorumluEposta` ,  `SirketTel1` ,  `SirketTel2`  FROM  `tbl_musteriler`  ORDER BY  `tbl_musteriler`.`SirketSorumlusu` ASC ";
$GelenMusteriler=mysql_query($MusterileriGetir_SQL);
while($MusterilerBilgi = mysql_fetch_array($GelenMusteriler))
{ ?>
				<tr>
             	 <td><?php echo $MusterilerBilgi[SirketSorumlusu]?></td>
                  <td><?php echo $MusterilerBilgi[SirketSorumluEposta]?></td>
                  <td><?php echo $MusterilerBilgi[SirketTel1]?></td>
                  <td><?php echo $MusterilerBilgi[SirketTel2]?></td>
                  <td>
                    <form action="musteri-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiSirket" type="hidden" value="<?php echo $MusterilerBilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-info" value="Detaylar" style="margin-right:2px;"> 
                    </form>

                </td>
                
                </tr>
			<?php }	?>                               
              </tbody>
            </table>
<?php
//

?>
            
 
            </div><!--panel-body -->
          </div><!--panel panel-primary -->
        </div><!--col-sm-12 -->
        
        
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
    </div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
