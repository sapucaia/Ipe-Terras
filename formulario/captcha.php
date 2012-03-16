<?php
session_start();
   $width    = 100;
   $height   = 38;
   $length   = 5;
   $font     = 'verdana.ttf';
   $font_size   = 12;
   $bg_color = array(255, 0, 0);
   $chars    = 'ABCDEFGHKMNPQRSTUVWXYZ23456789';
   putenv('GDFONTPATH=' . realpath('.'));
   if (extension_loaded('gd') == false)
   {
      die("A extensão PHP GD é necessária para o captcha!");
   }
   if (function_exists('imagettftext') == false)
   {
      die("A função 'imagettftext' é necessária para o captcha!");
   }
   $img = imagecreatetruecolor($width, $height);
   $bkgr = imagecolorallocate($img, rand(210,255), rand(210,255), rand(210,255));
   imagefilledrectangle($img, 0, 0, $width, $height, $bkgr);

   $right = rand(10, 30);
   $left = 0;
   while ($left < $width)
   {
      $poly_points = array($left, 0, $right, 0, rand($right-25, $right+25), $height, rand($left-15, $left+15), $height);
      $c = imagecolorallocate($img, rand(210,255), rand(210,255), rand(210,255));
      imagefilledpolygon($img, $poly_points, 4, $c);
      $random_amount = rand(10, 30);
      $left += $random_amount;
      $right += $random_amount;
   }
   $c_min = rand(120, 185);
   $c_max = rand(195, 280);
   $left = 0;
   while ($left < $width)
   {
      $right = $left + rand(3, 7);
      $offset = rand(-3, 3);
      $line_points = array($left, 0, $right, 0, $right + $offset, $height, $left + $offset, $height);
      $pc = imagecolorallocate($img, rand($c_min, $c_max), rand($c_min, $c_max), rand($c_min, $c_max));
      imagefilledpolygon($img, $line_points, 4, $pc);
      $left += rand(20, 60);
   }
   $top = 0;
   while ($top < $height)
   {
      $bottom = $top + rand(1, 4);
      $offset = rand(-6, 6);
      $line_points = array(0, $top, 0, $bottom, $width, $bottom + $offset, $width, $top + $offset);
      $pc = imagecolorallocate($img, rand($c_min, $c_max), rand($c_min, $c_max), rand($c_min, $c_max));
      imagefilledpolygon($img, $line_points, 4, $pc);
      $top += rand(8, 15);
   }

   $code = '';
   for($i = 0; $i < $length; $i++)
   {
      $code .= $chr = $chars[mt_rand(0, strlen($chars)-1)];
      $r = rand(0, 192);
      $g = rand(0, 192);
      $b = rand(0, 192);
      $color = imagecolorallocate($img, $r, $g, $b);
      $shadow = imagecolorallocate($img, $r/3, $g/3, $b/3);
      $rotation = rand(-35, 35);
      $x = 5+$i*(4/3*$font_size+2);
      $y = rand(4/3*$font_size, $height-(4/3*$font_size)/2);
      imagettftext($img, $font_size, $rotation, $x+1, $y+3, $shadow, $font, $chr);
      imagettftext($img, $font_size, $rotation, $x, $y, $color, $font, $chr);
   }

   $_SESSION['random_txt'] = md5($code);

   header("Content-type: image/png");
   header("Expires: Mon, 01 Jul 1998 05:00:00 GMT");
   header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
   header("Cache-Control: no-store, no-cache, must-revalidate");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");

   imagepng($img);
   imagedestroy($img);
?>
