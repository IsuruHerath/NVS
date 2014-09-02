<?php
include 'DBConnector.php';
$text = $_POST['id'];
$query = "SELECT id FROM authentication where id like '" . $text . "%'";
$connector = new DBConnector();
$result = $connector->getData($query);

$ret = Array();
while ($row = mysqli_fetch_array($result)) {
     $ret[] = $row['id'];
}
echo json_encode($ret);
?>
