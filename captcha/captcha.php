<?php   
   session_start();   
   unset($_SESSION['captcha_spam']);   
  
   function randomString($len) {   
      srand(date("s"));   
      //Der String $possible enthält alle Zeichen, die verwendet werden sollen  
      $possible="ABCDEFGHJKLMNPRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789";   
      $str="";   
      while(strlen($str)<$len) {   
        $str.=substr($possible,(rand()%(strlen($possible))),1);   
      }   
   return($str);   
   }   
  
   $text = randomString(5);  //Die Zahl bestimmt die Anzahl stellen  
   $_SESSION['captcha_spam'] = $text;  
           
   header('Content-type: image/png');   
   $img = ImageCreateFromPNG('captcha_dark.png'); //Backgroundimage   
   $color = ImageColorAllocate($img, 255, 255, 255); //Farbe   
   //$ttf = $_SERVER['DOCUMENT_ROOT']."/darkrainBAND/captcha/XFILES.TTF"; //Schriftart(absolute)
   $ttf = "XFILES.TTF"; //Schriftart(relative)
   $ttfsize = 20; //Schriftgrösse   
   $angle = rand(0,5);   
   $t_x = rand(5,30);   
   $t_y = 35;   
   imagettftext($img, $ttfsize, $angle, $t_x, $t_y, $color, $ttf, $text);   
   imagepng($img);   
   imagedestroy($img);   
?>