<?php session_start();
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
            <form enctype="multipart/form-data" action="upload.php" method="POST">
                <table>
                    <tr>
                        <td><a href="report.php">Report</a> </td>
                        <td><a href="selectAlbum.php">Album Selection</a> </td>
                    </tr>
                    <tr>
                        <td>Choose a file</td>
                        <td><input name="uploaded" type="file" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Upload" /></td>
                    </tr>
                </table>
            </form>
            <?php
            if(isset ($_SESSION['albumName'])) {
                echo "<h1>Photos will be uploaded to \"<u>".$_SESSION['albumName']."</u>\" album in Picassa</h1>";
            }
            else {
                echo "<h1>Session may expeired; First select an Album.</h1>";
            }
            ?>
        </div>
    </body>
</html>