<?php
session_start();
$products = null;

if (!empty($_SESSION['products'])) {
	$products = $_SESSION['products'];
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery add and remove table row</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta http-equiv="imagetoolbar" content="no" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<div id="wrapper">


	<form action="" method="post" id="form_products">
		<input type="text" id="name" name="name"
			class="field field_medium"
			placeholder="Product name" value="" />
		<input type="text" id="price" name="price"
			class="field field_small"
			placeholder="Price" value="" />
		<input type="text" id="qty" name="qty"
			class="field field_small"
			placeholder="Qty" value="" />
		<a href="#" class="button add_new">Add new</a>
	</form>

	<div id="table_wrapper">
	
		<?php if (!empty($products)) { ?>
		
			<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
			
				<tr>
					<th>Product name</th>
					<th class="col_1 ta_r">Price</th>
					<th class="col_1 ta_r">Qty</th>
					<th class="col_1 ta_r">Remove</th>
				</tr>
				
				<?php foreach($products as $key => $row) { ?>
					
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td class="ta_r">&pound;<?php echo $row['price']; ?></td>
						<td class="ta_r"><?php echo $row['qty']; ?></td>
						<td class="ta_r">
							<a href="#" class="remove" rel="<?php echo $key; ?>">
								Remove
							</a>								
						</td>
					</tr>
					
				<?php } ?>
			
			</table>
		
		<?php } else { ?>
			
			<p>There are currently no records available.</p>
		
		<?php } ?>
		
	</div>


</div>



<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="/js/core.js" type="text/javascript"></script>
</body>
</html>