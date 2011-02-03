<?php
session_start();
include "class connection.php";
$connect=1;
$disconnect=0;
$dataIncomplete=0;
$database="imageUpload";

$insertionObject=new databaseConnectionClass();
$insertionObject -> dbconnector($database,$connect);

$supplierName = $_POST['supplierName'];
$billNo = $_POST['billNo'];
$billDate = $_POST['billDate'];
$grDate = $_POST['grDate'];
$defect = $_POST['defect'];
$details = $_POST['details'];
$colour = $_POST['colour'];
$pack = $_POST['pack'];
$uom = $_POST['uom'];
$cds = $_POST['cds'];
$noOfPacks = $_POST['noOfPacks'];
$pkdDate = $_POST['pkdDate'];
$batch = $_POST['batch'];
$mrp = $_POST['mrp'];
$imageName = $_POST['img'];

if($supplierName=="") {
    $dataIncomplete=1;
    header('Location:index.php');
}

$imageCaption="SUPPLIER NAME : " . $supplierName . "\n";
$imageCaption=$imageCaption."Bill No : ".$billNo . "\n";
$imageCaption=$imageCaption."Bill Date : ".$billDate . "\n";
$imageCaption=$imageCaption."GR Date : ".$grDate . "\n";
$imageCaption=$imageCaption."Defect : ".$defect . "\n";
$imageCaption=$imageCaption."Details of Goods : ".$details . "\n";
$imageCaption=$imageCaption."Colour : ".$colour . "\n";
// this is for giving " 4 LT TIN " insted of giving "PACK:4 ,UOM:LT , CDS: TIN"
$imageCaption=$imageCaption."Pack : ".$pack." ".$uom." ".$cds. "\n";
//$imageCaption=$imageCaption."UOM : ".$uom . "\n";
//$imageCaption=$imageCaption."CDS : ".$cds . "\n";
$imageCaption=$imageCaption."No.of Packs : ".$noOfPacks . "\n";
$imageCaption=$imageCaption."Pkd Date : ".$pkdDate . "\n";
$imageCaption=$imageCaption."Batch : ".$batch . "\n";
$imageCaption=$imageCaption."MRP : ".$mrp . "\n";


echo "IMAGE NAME : ".$imageName;
echo "<br>SUPPLIER NAME : ".$supplierName;
echo "<br>Bill No : ".$billNo;
echo "<br>Bill Date : ".$billDate;
echo "<br>GR Date : ".$grDate;
echo "<br>Defect : ".$defect;
echo "<br>Details of Goods : ".$details;
echo "<br>Colour : ".$colour;
echo "<br>Pack : ".$pack;
echo "<br>UOM : ".$uom;
echo "<br>CDS : ".$cds;
echo "<br>No.of Packs : ".$noOfPacks;
echo "<br>Pkd Date : ".$pkdDate;
echo "<br>Batch : ".$batch;
echo "<br>MRP : ".$mrp;

$dedate=date("Y-m-d");
//echo $dedate;

if(!$dataIncomplete) {
    $query = "insert into image_upload_master values (NULL,'$imageName','$supplierName',
'$billNo','$billDate','$grDate','$defect','$details','$colour','$pack'
,'$uom','$cds','$noOfPacks','$pkdDate','$batch','$mrp','$dedate')";
    $result = mysql_query($query);

    $insertionObject -> dbconnector($database,$disconnect);
}
//--jasim start---


if(isset ($_SESSION['albumName'])) {

    $albumName = $_SESSION['albumName'];
    #$albumName = "MayESDEE";

}


require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Photos');
Zend_Loader::loadClass('Zend_Http_Client');

// connect to service
$svc = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
$user = "sph123";
$pass = "h2ocOOH1";
$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $svc);
$gphoto = new Zend_Gdata_Photos($client);

// sanitize input
$title = htmlentities($imageCaption);

// construct photo object
// save to server
try {
    $photo = $gphoto->newPhotoEntry();

    // set file
    $file = $gphoto->newMediaFileSource("img/".$imageName);
    $file->setContentType("image/jpeg");
    $photo->setMediaSource($file);

    // set title
    $photo->setSummary($gphoto->newSummary($title));

    $tags="";
    // set tags
    $photo->mediaGroup = new Zend_Gdata_Media_Extension_MediaGroup();
    $keywords = new Zend_Gdata_Media_Extension_MediaKeywords();
    $keywords->setText($tags);
    $photo->mediaGroup->keywords = $keywords;


    // link to album
    $album = $gphoto->newAlbumQuery();
    $album->setUser($user);
    $album->setAlbumName($albumName);

    // save photo
    $gphoto->insertPhotoEntry($photo, $album->getQueryUrl());
} catch (Zend_Gdata_App_Exception $e) {
    echo "Error: " . $e->getResponse();
}
echo "<br><h1>Image uploaded to \"<u>".$_SESSION['albumName']."</u>\" album in Picassa</h1>";
//}
if($result) {
    echo '<br><h2><a href="index.php">Click to go Back</a></h2>';
    //    header('Location:index.php');
}
else {
    echo "<br><br><br>Error in saving data. This file may already saved";
    echo '<br><h2><a href="index.php">Click to go Back</a></h2>';
}
//--end

?>