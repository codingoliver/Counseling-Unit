<?php
include'includes/function.php';
include'includes/connection.php';
echo connection_open();
include 'includes/header_top.html'; ?>

<title>Fees, Costs & Booking a Session</title>
<?php
include 'includes/header_bottom.html';
include 'includes/nav.html';
?>
		<div class="row fees">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<h2>Fees & Booking a Session</h2>
				<div class="fees-intro">
					<p class="first">Payments will be requested by the official PayPal website only. This offers you complete payment security and online protection.</p>
					<p class="important">You do not need to have a PayPal account, you can simply pay with your credit or debit card through PayPal.</p>
					<p>Once payment is received, you will be sent a receipt and an email from me to confirm your session. All sessions should be paid for at least 3 days prior to the session date unless discussed in advance with me.</p>
					<p class="important">Please note: Requests to reschedule must be emailed to me at least 24 hours prior to the scheduled appointment, otherwise the session will be charged. Missed sessions without prior contact will need to be charged.</p>
					<img src="images/paypal-cards.png" class="img-responsive center-block" alt="cards accepted" width="500" height="63">
				</div>
				<?php $query = Select_All_Records('tbl_product_detail');
				$query->setFetchMode(PDO::FETCH_ASSOC);
				while ($result = $query->fetch())
				{
					$pname = $result['product_name'];
					$pprice = $result['product_price'];
					$description = explode('#@#', $result['product_dec']);?>
					<form action="process.php" method="post">
						<div class="product_content">
							<?php
								foreach ($description as $value) { ?>
								<div class="pay-type">
									<h3><?php echo $pname?> <b class="price pull-right"><?php echo "£" . $pprice ?></b></h3>
									<p><?php echo $value?></p>
									<input type="hidden" value="<?php echo $result['item_number'];?>" name="product_id">
									<button type="submit" class="fees-button" name="submit"><i class="fa fa-paypal" aria-hiiden="true"></i><?php echo "Buy Now £". $result['product_price'];?></button>
							<?php } ?>
								</div>
						</div>
					</form>
					<?php
				}
				?>
				<div class="pay-type last">
					<h3>Intensive Counselling <b class="pull-right">(Email me for quotes)</b></h3>
					<p>Travel to your chosen holiday destination and combine a wonderful relaxing holiday whilst having intensive counselling with me. I will work with you daily and really get to know you.
					This will give me great insight into how you function and deal with the problems around you and then I will be able to help you live a happier and healthier life.
					This package is ideal for people with several interlinked problems and will benefit you by combining intensive counsellor time with the added advantage of a relaxing new environment.
					Intensive counselling is available anywhere in fact wherever you want to receive help, it can be arranged by appointment.</p>
					<a href="mailto:" role="button" class="quote-button"><i class="fa fa-at" aria-hidden="true"></i>Email Me</a>
				</div>
			</div>
		</div>
	</div>
<?php
include'includes/socialicons.html';
include'includes/footer.php';
//connection_close() is used for closing the connection . 
 connection_close();
?>