<?php

?>
        <div class="col-md-3">
          <ul class="nav nav-sidebar">
            <li class="<?php if(strstr($_SERVER[SCRIPT_NAME],"index.php")==true) {echo 'active';}?>"><a href="index.php"><img src="assets/images/icons/home32.png" width="16" height="16" class=""> Başlangıç Ekranı</a></li>
          </ul>
          <hr>
          <ul class="nav nav-sidebar">
            <li class="<?php if(strstr($_SERVER[SCRIPT_NAME],"musteri-gor.php")==true) {echo 'active';}?>"><a href="musteri-gor.php"><img src="assets/images/icons/users32.png" width="16" height="16" class=""> Müşteriler</a></li>
            
            <li class="<?php if(strstr($_SERVER[SCRIPT_NAME],"hizmet-gor.php")==true) {echo 'active';}?>"><a href="hizmet-gor.php"><img src="assets/images/icons/gear32.png" width="16" height="16" class=""> Hizmetler</a></li>
          </ul>
          <hr>
          <ul class="nav nav-sidebar">          		
                    <li class="<?php if(strstr($_SERVER[SCRIPT_NAME],"fihrist.php")==true) {echo 'active';}?>"><a href="fihrist.php"><img src="assets/images/icons/contactbook32.png" width="16" height="16" class=" "> Adres ve Telefon Defteri</a></li>          
          </ul>
          <hr>
          <ul class="nav nav-sidebar">
            <li class="<?php if(strstr($_SERVER[SCRIPT_NAME],"hesabim.php")==true) {echo 'active';}?>"><a href="hesabim.php"><img src="assets/images/icons/user32.png" width="16" height="16" class=""> Hesabım</a></li>
            <li class="<?php if(strstr($_SERVER[SCRIPT_NAME],"yardim.php")==true) {echo 'active';}?>"><a href="yardim.php"><img src="assets/images/icons/questionbook32.png" width="16" height="16" class=""> Yardım</a></li>
          </ul>
<hr>
          <a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-off  "></span>  Sistemden Çıkış</a>

<!--<hr><div class="well ">
        <p>Program hakkında detaylı kullanım bilgisi için <a href="#" class="btn btn-xs btn-info" >Yardım</a> menüsüne başvurabilirsiniz.</p>
</div> -->          
          
</div>


