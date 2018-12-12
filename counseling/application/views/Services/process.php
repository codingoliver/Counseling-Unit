<?php
include 'includes/function.php';
include 'includes/connection.php';
if (isset($_POST['submit'])) {
    echo connection_open();
    if (isset($_POST['product_id'])) {
        $product_id = base64_decode($_POST['product_id']);
        $data = array(
            'product_id' => $product_id
        );
        $query = Select_Record_By_One_Filter($data, 'tbl_product_detail');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetch();
        #Cal/Neil this url is a testing URL on deployment of website change this variable to the real Paypal.
        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        #Currently are my details but please insert Paula's details 
        $merchant_email = 'calogero27@hotmail.co.uk';
        $cancel_return = "http://localhost/On-Line-Counselling-master/fees.php";
        #Redirection to Successful Transaction (Dom Styles Required)
        $success_return = "http://localhost/On-Line-Counselling-master/success.php";
        
        $product_name = $result['product_name'];
        $product_price = $result['product_price'];
        $product_currency = $result['product_currency'];
        echo connection_close();
    }

    'includes/header_top.html'; ?>
    <title>Processing your payment</title>
    <?php include 'includes/header_bottom.html';?>
    <div class="spinner">
        <img src="images/loader.gif" alt="processing your payment">
    </div>
    <form name="myform" action="<?php echo $paypal_url; ?>" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_return ?>">
        <input type="hidden" name="return" value="<?php echo $success_return; ?>">
        <input type="hidden" name="business" value="<?php echo $merchant_email; ?>">
        <input type="hidden" name="lc" value="C2">
        <input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
        <input type="hidden" name="item_number" value="<?php echo $_POST['product_id']; ?>">
        <input type="hidden" name="amount" value="<?php echo $product_price; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $product_currency; ?>">
        <input type="hidden" name="button_subtype" value="services">
        <input type="hidden" name="no_note" value="0">
    </form>
    <script type="text/javascript">
        document.myform.submit();
    </script>
<?php }
include 'includes/footer.php'?>

