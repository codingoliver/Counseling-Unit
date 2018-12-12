<?php
/*include('include/function.php');
include('include/connection.php');
echo connection_open();*/
?>
<?php include 'includes/header_top.html'; ?>
	<title>Payment successful</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="JS/bootstrap.min.js"></script>
	<!-- Custom JS -->
	<script src="JS/controls.js"></script>
	<script src="https://use.fontawesome.com/71ebc9e44c.js"></script>
	<!-- Custom CSS -->
	<link href="CSS/styles.css" rel="stylesheet">
	<link href="CSS/social-styles.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
    <body id="success">
        <?php
        // if (!empty($_REQUEST)) {
            // $product_no = $_REQUEST['item_number']; 
            // $product_transaction = $_REQUEST['tx']; 
            // $product_price = $_REQUEST['amt']; 
            // $product_currency = $_REQUEST['cc']; 
            // $product_status = $_REQUEST['st']; 
            // $product_no = base64_decode($product_no);
            // $data = array
			// (
                // 'product_id' => $product_no
            // );
            // $query = Select_Record_By_One_Filter($data, 'tbl_product_detail');
            // $query->setFetchMode(PDO::FETCH_ASSOC);
            // $result = $query->fetch();
            // echo connection_close();
        // }
        ?>
		<div class="container-fluid">
			<div class="row success">
				<div class="receipt">
				<!--Successful Transaction -->
					<div class="id pull-left">
						<p class="what">On-Line-Counselling-Services</p>
						<p class="what">Customer Receipt</p>
					</div>
					<div class="date pull-right">
						<p class="when">3rd June 2016</p>
						<p class="when">Receipt: #2132432D</p>
					</div>
					<div class="details clearfix">
						<h1>Receipt</h1>
						<h2>Service<b class="pull-right">Price</b></h2>
						<p class="service">Email Session<b class="pull-right gross">£39</b></p>
						<div class="payment-status clearfix">
							<h2>Payment status</h2>
							<p class="text-success service">Successful</p>
							<!--<p class="text-danger service">Failed</p>-->
							<h2>Transaction Status</h2>
							<p class="text-success service">Complete</p>
							<!--<p class="text-danger service">Failed</p>-->
							<h2>Transaction ID</h2>
							<p class="service">5GHTJIDM5$S5</p>
							<!--<p class="service">N/A</p>-->
						</div>
						<div class="cost">
							<h3>Total: <b class="total">£39.00</b></h3>
						</div>
					</div>
					<button type="button" class="btn btn-success"><a href="fees.php"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Fees page</a></button>
					<button type="button" class="btn btn-info pull-right" onclick="window.print()"><i class="fa fa-print"></i>&nbsp;&nbsp;Print Receipt</button>
				</div>
                <?php
                /* Rechecking the product price and currency detail
				
                if ($product_price == $result['product_price'] && $product_currency == $result['product_currency']) 
				{
                    echo "<h3>Payment Successful</h3>";
                    echo "<P>Transaction Status - " . $product_status . "</P>";
                    echo "<P>Transaction Id - " . $product_transaction . "</P>";
                    echo "<p><a href='fees.php'>Back to Fees page</a></p>";
                } 
				else 
				{
                    echo "<h3>Payment Failed</h3>";
                    echo "<P>Transaction Status - incomplete</P>";
					echo "<P>Transaction Id - " . $product_transaction . "</p>";
                    echo "<p><a href='fees.php'>Back to Fees page</a></p>";
                 }*/
                ?>
				</div>
			</div>
        </div>
    </body>
</html>

