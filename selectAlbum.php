<?php
session_start();
session_destroy();
session_start();
$connect=1;
$disconnect=0;
$dataIncomplete=0;
$database="imageUpload";
include 'class connection.php';
$selectAlbumObject=new databaseConnectionClass();
$selectAlbumObject -> dbconnector($database,$connect);
?>
<html>
    <head>
        <link rel="StyleSheet" href="./css/upload.css" type="text/css">
    </head>
    <body>
        <div class="banner">
            <h1>DAMAGED GOODS RECEIVED </h1>
        </div>
        <div class="mainWrapper">
            <table>
                <form action="selectAlbum.php" method="POST">
                    <tr>
                        <td><a href="index.php">Back</a></td>
                        <td><a href="createAlbum.php">New Album</a></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Choose an Album</td>
                        <td>

                            <select id="album" name="album">
                                <option></option>
                                <?php
                                $loadAlbumQuery="SELECT DISTINCT album_name FROM album";
                                $loadAlbumResult=mysql_query($loadAlbumQuery);
                                $noOfAlbums=mysql_num_rows($loadAlbumResult);
                                if($noOfAlbums) {
                                    while($row=mysql_fetch_array($loadAlbumResult,MYSQL_ASSOC)) {
                                        echo"<option>".$row["album_name"]."</option>";
                                    }
                                }
                                $selectAlbumObject -> dbconnector($database,$disconnect);
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="select" value="SELECT IT" id="select">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>
<?php
if(isset ($_POST['album'])) {
    $_SESSION['albumName']=$_POST['album'];
    echo "<h1> Album selectd";
}
?>