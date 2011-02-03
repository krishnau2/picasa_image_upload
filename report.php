<html>
    <head>
        <title>DAMAGED/DEFECTIVE/DISCREPANCY OF GOODS RECEIVED REPORT</title>
    </head>
    <?php
    include "class connection.php";
    $connect=1;
    $disconnect=0;
    $database="imageUpload";

    $insertionObject=new databaseConnectionClass();
    $insertionObject -> dbconnector($database,$connect);

    $query = "SELECT * FROM image_upload_master";
    $result = mysql_query($query);
    $rows = mysql_num_rows($result);
    ?>
    <table border="1">
        <?php for($j=0 ; $j < $rows ; $j++) {
            $sl=$j+1;
            echo '<tr><td>'.$sl.'</td><td></td><td>'.mysql_result($result,$j,'image_name').'</td></tr>';
            echo "<tr><td>Supplier Name - </td>";
            echo "<td>". mysql_result($result,$j,'supplier_name') ."</td>";
            echo '<td rowspan="12">';
            echo '<img src="img/'.mysql_result($result,$j,'image_name').'"'.'width="200" height="150" >';
            echo '</td></tr>';
            echo '<tr><td>Bill No - </td>';
            echo '<td>'.mysql_result($result,$j,'bill_no').'</td>';
            echo '</tr>';
            echo '<tr><td>Bill Date - </td>';
            $bill_date_array = explode("-",mysql_result($result,$j,'bill_date')); // split the array
            echo '<td>'.$bill_date_array[2].'/'.$bill_date_array[1].'/'.$bill_date_array[0].'</td>';
            echo '</tr>';
            echo '<tr><td>GR Date - </td>';
            $gr_date_array = explode("-",mysql_result($result,$j,'gr_date'));
            echo '<td>'.$gr_date_array[2].'/'.$gr_date_array[1].'/'.$gr_date_array[0].'</td>';
            echo '</tr>';
            echo '<tr><td>Defect - </td>';
            echo '<td>'.mysql_result($result,$j,'defect').'</td>';
            echo '</tr>';
            echo '<tr><td>Name of Goods - </td>';
            echo '<td>'.mysql_result($result,$j,'details').'</td>';
            echo '</tr>';
            echo '<tr><td>Colour - </td>';
            echo '<td>'.mysql_result($result,$j,'colour').'</td>';
            echo '</tr>';
            echo '<tr><td>Pack - </td>';
            echo '<td>'.mysql_result($result,$j,'pack')." ".mysql_result($result,$j,'uom')." ".mysql_result($result,$j,'cds').'</td>';
            echo '</tr>';
//            echo '<tr><td>UOM - </td>';
//            echo '<td>'.mysql_result($result,$j,'uom').'</td>';
//            echo '</tr>';
//            echo '<tr><td>CDS - </td>';
//            echo '<td>'.mysql_result($result,$j,'cds').'</td>';
//            echo '</tr>';
            echo '<tr><td>No.of Packs - </td>';
            echo '<td>'.mysql_result($result,$j,'no_of_packs').'</td>';
            echo '<tr><td>Pkd Date - </td>';
            echo '<td>'.mysql_result($result,$j,'pkd_date').'</td>';
            echo '</tr>';
            echo '<tr><td>Batch - </td>';
            echo '<td>'.mysql_result($result,$j,'batch').'</td>';
            echo '</tr>';
            echo '<tr><td>MRP - </td>';
            echo '<td>'.mysql_result($result,$j,'mrp').'</td>';
            echo '</tr>';
            echo '<tr><td colspan="3">==========================================================================</td></tr>';
        }
        ?>
    </table>
</html>
