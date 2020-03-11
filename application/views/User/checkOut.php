<!DOCTYPE html>
<html lang="en">
<?php require("head.php"); ?>

<body class="animsition">

	<?php require("header.php"); ?>
	<br><br><br><br>

	<div>
		<?php
		if (isset($_SESSION['order'])) { ?>
			<div class="alert alert-success">
				<?php echo $_SESSION['order']; ?>
			</div>
		<?php } ?>
	</div>
	<div>
		<div class="col-lg-12 col-xl-10 m-lr-auto m-b-100">
			<div class="m-l-60 m-r--38 m-lr-0-xl">
				<div class="wrap-table-shopping-cart">
					<h1>Your Order</h1>
					<?php echo form_open(base_url() . 'Order/placeOrder'); ?>
					<table class="table table-bordered">
						<tr>
							<th>No. of Products</th>
							<td>
								<?php echo count($this->cart->contents()); ?>
							</td>
						</tr>
						<tr>
							<th>Grand Total</th>
							<td>$<?php echo $this->cart->total(); ?>
							</td>
							<input name="grandTotal" type="hidden" value="<?php echo $this->cart->total(); ?>"></input>
						</tr>
						<tr>
							<th>Address</th>
							<td>
								<textarea class="form-control" name="address" placeholder="Type Your Address"></textarea>
							</td>
						</tr>
						<tr>
							<th>Phone Number</th>
							<td>
								<input class="form-control" type="text" name="phoneNo" placeholder="Phone Number"></input>
							</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>
								<input class="form-control" type="emial" name="email" placeholder="Email Addresss"></input>
							</td>
						</tr>
						<tr>
							<td>
								<input class="btn btn-success" type="submit" value="Check Out"></input>
							</td>
						</tr>


					</table>
					<?php echo form_close(); ?>
				</div>


			</div>
		</div>
	</div>




	<?php require("footer.php"); ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



	<?php require("foot.php"); ?>

</body>

</html>
