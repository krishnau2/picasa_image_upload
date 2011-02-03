<?php
session_start();
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
            <a href="index.php">Back</a>
            <?php
            if(isset ($_SESSION['albumName'])) {
                echo "<br><h1>This image will be uploaded to \"<u>".$_SESSION['albumName']."</u>\" album in Picassa</h1>";
            }
            else{
                echo "<br><h1>Please choose an ALBUM first !</h1>";
            }
            $target = "img/";
            $target = $target . basename( $_FILES['uploaded']['name']) ;
            $ok=1;

//Here we check that $ok was not set to 0 by an error 
            if ($ok==0) {
                Echo "<br>Sorry your file was not uploaded";
            }

//If everything is ok we try to upload it 
            else {
                if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
//                    echo "<br>The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
                    $getImage="img/".$_FILES['uploaded']['name'];
                    $imageName=$_FILES['uploaded']['name'];
                }
                else {
                    echo "<br>Sorry, there was a problem uploading your file.";
                }
            }
            ?><center>
                <img src=<?php echo $getImage;?> width="250" height="200" >
            </center>
            <form action="saveToDb.php" method="POST" >
                <input type="hidden" name="img" value=<?php echo $imageName;?>>
                <table>
                    <tr>
                        <td>Supplier Name</td>
                        <td>Bill No</td>
                        <td>Bill Date</td>
                        <td>GR Date</td>
                        <td>Defects</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="supplierName" id="supplierName"> </td>
                        <td><input type="text" name="billNo" id="billNo" size="10"> </td>
                        <td><input type="text" name="billDate" id="billDate" size="10"> </td>
                        <td><input type="text" name="grDate" id="grDate" size="10"> </td>
                        <td><select id="defect" name="defect">
                                <option></option>
                                <option>Leaky,Damaged,Spoiled,Rusted</option>
                                <option>No MRP.Pkd date, Batch No.</option>
                                <option>Twin Pack System without the outer carton/hardener</option>
                                <option>Leaky,Damaged,Spoiled,Rusted & No MRP.Pkd date, Batch No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Name of Goods</td>
                        <td>Colour</td>
                        <td>Pack</td>
                        <td>UOM</td>
                        <td>CDS</td>

                    </tr>
                    <tr>
                        <td><input type="text" name="details" id="details"></td>
                        <td><input type="text" name="colour" id="colour" size="10"> </td>
                        <td><input type="text" name="pack" id="pack" size="10"></td>
                        <td><input type="text" name="uom" id="uom" size="10"> </td>
                        <td><input type="text" name="cds" id="cds" size="10"> </td>
                    </tr>
                    <tr>
                        <td>No.of Packs</td>
                        <td>Pkd Date</td>
                        <td>Batch</td>
                        <td>MRP</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="noOfPacks" id="noOfPacks"> </td>
                        <td><input type="text" name="pkdDate" id="pkdDate" size="10"> </td>
                        <td><input type="text" name="batch" id="batck" size="10"> </td>
                        <td><input type="text" name="mrp" id="mrp" size="10"> </td>
                        <td><input type="submit" name="save" value="SAVE" id="save"> </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>