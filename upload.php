<?php
$target_dir = "uploads/";

//$target_file = $target_dir . basename($new_name);
echo '<pre>';
echo print_r($_FILES);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name = basename($target_file);

$fdata = pathinfo($name);

$filename = $fdata['filename']; // good
$ext = $fdata['extension']; // rar

$new = rand(0,10000000);
echo $filename."<br>";
echo $ext."<br>";



//$actual_name = pathinfo($name,PATHINFO_FILENAME);
//$original_name = $actual_name;
//$extension = pathinfo($name, PATHINFO_EXTENSION);
//
//$i = 1;
//while(file_exists('tmp/'.$actual_name.".".$extension))
//{
//    $actual_name = (string)$original_name.$i;
//    $name = $actual_name.".".$extension;
//    $i++;
//}



$uploadOk = 1;



//$i="a1.png";

//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "File already exists, but I change name";
//    rename($filename, $new);


if(file_exists($target_file)){
    $date = new DateTime();
    $name =  $new.$name ;
//    echo "File already exists, but I change name";
//    echo '<br>' . $name ."<br>";
    $uploadOk = 1;
    $copyName = $target_dir.$name;
    echo $copyName.'<br>';

    copy($_FILES['fileToUpload']['tmp_name'], $copyName);
}
//
//if(file_exists($target_file)){
//    $i = 1;
//    while(file_exists($i."_".$target_file)){
//        $i++;
//    }
//    $name = $i."_".$target_file;
//}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//    && $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "<br>";




//
//nction rename_appending_unique_id($source, $tempfile){
//
//$target_path ='uploads-unique-id/'.$source;
//     while(file_exists($target_path)){
//         $fileName = uniqid().'-'.$source;
//         $target_path = ('uploads-unique-id/'.$fileName);
//     }
//
//    move_uploaded_file($tempfile, $target_path);
//
//}
//
//if(isset($_FILES['upload']['name'])){
//
//    $sourcefile= $_FILES['upload']['name'];
//    tempfile= $_FILES['upload']['tmp_name'];
//
//    rename_appending_unique_id($sourcefile, $tempfile);
//
//}
//
//



?>

<!---->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDataBase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyFiles (name)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

