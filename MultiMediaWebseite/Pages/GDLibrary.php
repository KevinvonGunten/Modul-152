<?php


  header('Content-type: image/jpeg');
  $image = imagecreatefromjpeg("../GD/Bild.jpg");
  $schwarz = ImageColorAllocate ($image, 0,0,0);  
  $size = "30";     
  $mleft = "700";     
  $mtop = "4";      
  $names = "Kevin, Amar";          
  $klasse = "i2a";
  ImageString ($image, $size, $mleft, $mtop, "$names", $schwarz);
  ImageString ($image, $size, 720, 30, "$klasse", $schwarz);

  $watermark = imagecreatefrompng('../GD/Logo.png');
  $mright = 350;
  $mbottom = 350;
  $sx = imagesx($watermark);
  $sy = imagesy($watermark);

  imagecopymerge($image, $watermark, imagesx($image) - $sx - $mright, imagesy($image) - $sy - $mbottom, 0, 0, imagesx($watermark), imagesy($watermark), 50);
  imagejpeg($image);

?>