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
					<h1>You Order</h1>
					<table class="table-shopping-cart tbl tbl-borderd">
						<tr class="table_head">
							<th class="column-1">No. of Products</th>
							<th class="column-2">Grand Total</th>
							<th class="column-3">Address</th>
							<th class="column-4">Phone No.</th>
							<th class="column-5">Email</th>
							<th class="column-6">Check Out</th>
						</tr>

						<?php echo form_open(base_url() . 'Order/placeOrder'); ?>
						<tr class="table_row">
							<td class="column-1">
								<?php echo count($this->cart->contents()); ?>
							</td>
							<td class="column-2">$<?php echo $this->cart->total(); ?>
								<input name="grandTotal" type="hidden" value="<?php echo $this->cart->total(); ?>"></input></td>
							<td class="column-3">
								<textarea name="address" placeholder="Type Your Address"></textarea>
							</td>
							<td class="column-4">
								<input type="text" name="phoneNo" placeholder="Phone Number"></input>
							</td>
							<td class="column-4">
								<input type="emial" name="email" placeholder="Email Addresss"></input>
							</td>
							<td class="column-6">
								<input class="btn btn-success" type="submit" value="Check Out"></input>
							</td>
						</tr>
						<?php echo form_close(); ?>

					</table>
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
