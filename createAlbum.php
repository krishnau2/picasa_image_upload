<?php
$connect=1;
$disconnect=0;
$dataIncomplete=0;
$database="imageUpload";
include 'class connection.php';
// Data base connections
$createAlbumObject=new databaseConnectionClass();
$createAlbumObject -> dbconnector($database,$connect);

if(isset ($_POST['albumName'],$_POST['createdDate'])) {

    $albumName=$_POST['albumName'];
    $createdDate=$_POST['createdDate'];

    $albumCreationQuery = "insert into album values (NULL,'$albumName','$createdDate')";
    $albumCreationResult = mysql_query($albumCreationQuery);

    $createAlbumObject -> dbconnector($database,$disconnect);

    
}
?>
<html>
    <head>
        <script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="./js/jquery-ui-1.8rc3.custom.min.js"></script>
        <script type="text/javascript" src="./js/upload.js"></script>
        <LINK REL=StyleSheet HREF="./css/dark-hive/jquery-ui-1.8rc3.custom.css" TYPE="text/css">
        <link rel="StyleSheet" href="./css/upload.css" type="text/css">
    </head>
    <body>
        <div class="banner">
            <h1>DAMAGED GOODS RECEIVED </h1>
        </div>
        <div class="mainWrapper">
            <table>
                <tr>
                    <td><a href="selectAlbum.php">Back</a></td>
                </tr>
            </table>
            <form action="createAlbum.php" method="POST">
                <table>
                    <tr>
                        <td>Album Name</td>
                        <td>Create Date</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="albumName" name="albumName" ></td>
                        <td><input type="text" id="createdDate" name="createdDate"></td>
                        <td><input type="submit" id="createAlbum" name="createAlbum" value="create Album"></td>
                    </tr>
                </table>
            </form>
            <div style="font-size: 20px; font-weight: bold; color: green">
                <?php if($albumCreationResult){ echo "Album Created Successfully"; } ?>
            </div>
        </div>
    </body>
</html>