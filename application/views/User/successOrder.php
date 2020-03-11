<!DOCTYPE html>
<html lang="en">
<?php require("head.php"); ?>

<body class="animsition">

	<?php require("header.php"); ?>
	<br><br><br><br>

	<div>

	</div>
	<div>
		<div class="col-lg-12 col-xl-10 m-lr-auto m-b-100">
			<div class="m-l-60 m-r--38 m-lr-0-xl">

				<?php
				if (isset($_SESSION['order'])) { ?>
					<div class="alert alert-success">
						<?php echo $_SESSION['order']; ?>
					</div>
				<?php } ?>

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
