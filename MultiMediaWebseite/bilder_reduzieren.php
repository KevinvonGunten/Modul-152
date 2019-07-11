<?php

$uploaddirectory = "Imgs/";
$bilder = glob($uploaddirectory."*.{jpg,png,gif}", GLOB_BRACE);

foreach($bilder as $currentbild){
    echo "currentbild: ".$currentbild;

    $filetype = pathinfo($currentbild, PATHINFO_EXTENSION);

    switch($filetype) {
        case 'jpeg':
        case 'jpg':
            $img = imagecreatefromjpeg($currentbild);
            list($width, $height) = getimagesize($currentbild);
            $newwidth = $width/2;
            $newheight = $height/2;
            $destination = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($destination, $img ,0, 0, 0, 0, $newwidth,
            $newheight, $width, $height);
            $outbild = substr($currentbild, strpos($currentbild, '/', 1));
            
            imagejpeg($destination, "outputbilder/".$outbild, 100); 
           

            break;
        case 'png':
            $img = imagecreatefrompng($currentbild);
            list($width, $height) = getimagesize($currentbild);
            $newwidth = $width/2;
            $newheight = $height/2;
        
            $destination = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($destination, $img, 0, 0, 0, 0, $newwidth,
            $newheight, $width, $height);
            $outbild = substr($currentbild, strpos($currentbild, '/', 1));

            imagepng($destination, "outputbilder/".$outbild ,100); 

            break;
        case 'gif':
            $img = imagecreatefromgif($currentbild);
            list($width, $height) = getimagesize($currentbild);
            $newwidth = $width/5;
            $newheight = $height/5;
        
            $destination = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($destination, $img, 0, 0, 0, 0, $newwidth,
            $newheight, $width, $height);

            $outbild = substr($currentbild, strpos($currentbild, '/', 1));

            imagegif($destination, "outputbilder/".$outbild, 100); 





            break;

    }
    
    
    
}


?>