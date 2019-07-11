<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Nachrichten</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS/style.css";>
</head>


<body>
<?php
include "../Includes/header.php";
?>

    <h2>Nachrichten</h2>

<?php
$readfileName = $readfileContent = '';
if(isset($_GET['datei'])){
    $readfileNameall = $_GET['datei'];
    $readfileName =  str_replace(".txt","", $readfileNameall );
    $readfileContent = file_get_contents('./Mesages/'.$readfileNameall);

}
?> 
    <div class="container">
         <form action="" method ="POST">
             FileName: <input class="form-control mb-3" type="text" name="filename" size="15" value="<?php echo $readfileName; ?>">
             Text: <textarea class="form-control mb-3" type="text" name="texte"><?php echo $readfileContent; ?></textarea>
             <input type="submit" name="submit" value="Erstellen">
             <input type="submit" name="hinzufuegen" value="Hinzufügen">
             <input type='submit' name='Löschen' value='Löschen'>
        </form>
    </div>

<?php
    


if(isset($_POST['submit'])){
    $fileName = $_POST['filename'];
    $fileContent = $_POST['texte'];
    $filePath = './Mesages/'.$fileName.'.txt';
    if ($fileName > '') {
        if(file_exists('./Mesages/'.$fileName.'.txt')){
            file_put_contents($filePath, $fileContent, FILE_APPEND);
        } else {
            file_put_contents($filePath, $fileContent); 
        }
    }
}

if(isset($_POST['hinzufuegen'])){
    $fileName = $_POST['filename'];
    $fileContent = $_POST['texte'];
    $filePath = './Mesages/'.$fileName.'.txt';
    if ($fileName > '') {
        if(file_exists('./Mesages/'.$fileName.'.txt')){
        } else {
            file_put_contents($filePath, $fileContent); 
        }
    }
}


    foreach (glob('./Mesages/*.txt') as $fileName) {
        $trimmed = str_replace("./Mesages/","", $fileName);
        echo "<a href = '?datei=".$trimmed."'>".$trimmed."</a>";
        echo"</br> </br>";
    }

    if(isset($_POST['Löschen'])){
        $fileName = $_POST['filename'];
        $filePath = './Mesages/'.$fileName.'.txt';
        if ($fileName > '') {
            if(file_exists('./Mesages/'.$fileName.'.txt')){
                unlink('./Mesages/'.$fileName.'.txt');
            } else {
                echo "$fileName doesnt exist." ;
            }
        }
    }
    
?>

<?php
include "../Includes/footer.php";
?>

</body>
</html>