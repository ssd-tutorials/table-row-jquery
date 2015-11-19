<?php
session_start();


$tbl = !empty($_GET['tbl']) ? $_GET['tbl'] : 0;

$name = !empty($_POST['name']) ? $_POST['name'] : '&nbsp;';
$price = !empty($_POST['price']) ? $_POST['price'] : '&nbsp;';
$qty = !empty($_POST['qty']) ? $_POST['qty'] : '&nbsp;';



$index = !empty($_SESSION['products']) ? count($_SESSION['products']) + 1 : 1;

$_SESSION['products'][$index] = array(
	'name' => $name,
	'price' => $price,
	'qty' => $qty
);


$row  = '<tr>';
$row .= '<td>'.$name.'</td>';
$row .= '<td class="ta_r">&pound;'.$price.'</td>';
$row .= '<td class="ta_r">'.$qty.'</td>';
$row .= '<td class="ta_r"><a href="#" class="remove" rel="'.$index;
$row .= '">Remove</a></td>';
$row .= '</tr>';



if (empty($tbl)) {

	$out  = '<table cellpadding="0" cellspacing="0" ';
	$out .= 'border="0" class="tbl_repeat">';
	$out .= '<tr>';
	$out .= '<th>Product name</th>';
	$out .= '<th class="col_1 ta_r">Price</th>';
	$out .= '<th class="col_1 ta_r">Qty</th>';
	$out .= '<th class="col_1 ta_r">Remove</th>';
	$out .= '</tr>';
	$out .= $row;
	$out .= '</table>';
	$row = $out;

}

echo json_encode(array('row' => $row));







