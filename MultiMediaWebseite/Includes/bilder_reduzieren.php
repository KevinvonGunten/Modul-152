<?php

$uploaddirectory = "../Imgs/"; //Uploaddirectory, wo alle Bilder, die man verkleinern möchte, gespeichert sind
$bilder = glob($uploaddirectory."*.{jpg,png,gif}", GLOB_BRACE); //Alle Dateien die mit .jpg, .png und .gif enden, werden in da ausgewertet

foreach($bilder as $currentbild){ 

    $filetype = pathinfo($currentbild, PATHINFO_EXTENSION); //Dateiextension der Bilder wird abgefragt

    //Switchcase mit dieser Dateiextension, da die Funktionen für das Erstellen eines Bildes für jede Dateityp anders lauten.
    switch($filetype) {
        //JPEG
        case 'jpeg':
        case 'jpg':
            $img = imagecreatefromjpeg($currentbild); //Ein Bild wird aus diesem Path erstellt
            list($width, $height) = getimagesize($currentbild); //Liste mit Höhe und Breite des Bildes
            $newwidth = 200; //Die neue Breite wird für das Thumbnail definiert
            $newheight = 150; //Die neue Höhe wird für das Thumbnail definiert

            $destination = imagecreatetruecolor($newwidth, $newheight); 
            imagecopyresampled($destination, $img ,0, 0, 0, 0, $newwidth,
            $newheight, $width, $height); //Bild wird mit neuen Grössen kopiert
            $outbild = substr($currentbild, strpos($currentbild, '/', 3)); //Pfad wird verkürzt, damit das Bild abgespeichert werden kann
            
            imagejpeg($destination, "../outputbilder/".$outbild, 100); //Das Bild wird im Ordner outputbilder gespeichert
           

            break;
            //PNG
        case 'png':
            $img = imagecreatefrompng($currentbild);
            list($width, $height) = getimagesize($currentbild);
            $newwidth = 200;
            $newheight = 150;
        
            $destination = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($destination, $img, 0, 0, 0, 0, $newwidth,
            $newheight, $width, $height);
            $outbild = substr($currentbild, strpos($currentbild, '/', 3));

            imagepng($destination, "../outputbilder/".$outbild ,100); 

            break;
            //GIF
        case 'gif':
            $img = imagecreatefromgif($currentbild);
            list($width, $height) = getimagesize($currentbild);
            $newwidth = 200;
            $newheight = 150;
        
            $destination = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($destination, $img, 0, 0, 0, 0, $newwidth,
            $newheight, $width, $height);

            $outbild = substr($currentbild, strpos($currentbild, '/', 3));

            imagegif($destination, "../outputbilder/".$outbild, 100); 





            break;

    }
    
    
    
}


?>