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
          <h2 class="sub-header">MEKSA-MBS Destek Masası</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            
            <div class="panel-body">

			<!-- col-xs telefon için col-sm tablet için col md desktop için-->
			<div class="col-xs-12 col-sm-10 col-md-8">
		<div class="alert alert-info">
        	Destek Masası'na başvurmadan önce yardım belgelerine göz atmanızı öneririz. Destek talebinin geliştiricilere ulaştrılıp, varsa sorunun tanımlanması ya da probleminizin çözülmesi zaman alacaktır.
      	</div>            
			<ul class="list-group">
            	<li class="list-group-item">Yardım belgelerini <a href="yardim.php" class="btn btn-xs btn-info">buradan</a> ulaşabilirsiniz</li>
                <li class="list-group-item">Destek Talebi Formu'na <a href="#" class="btn btn-xs btn-info">buradan</a> ulaşabilirsiniz</li>
            </ul>
            
            
            </div><!--col-xs-12 col-sm-10 col-md-8 -->
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
