
<HTML>
<html lang="en">
<head>

<meta charset="utf-8">

<title>Galerie</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS/style.css";>
</head>


<body>
<?php
include "../Includes/header.php";
?>

<div class='content'>
<h2>Galerie</h2>

<?php
include "../Includes/bilder_reduzieren.php";


$imagedir = "../outputbilder/";
$image = glob($imagedir."*.{jpg,png,gif}", GLOB_BRACE);

$imagedir2 = "../Imgs/";
$image2 = glob($imagedir2."*.{jpg,png,gif}", GLOB_BRACE);

foreach($image as $index => $currentimage){
        echo "
    
        <a class='imglink' target='_blank' href='".$image2[$index]."'>
        <img src=".$currentimage." style='border: 0;float:left;'
        >
        </a>
        
        ";
    

}
?>



</div>



<?php
include "../Includes/footer.php";
?>

</body>
</html>

