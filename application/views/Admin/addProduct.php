<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#' + id)
					.attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<?php require('head.php'); ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php require('sidebar.php'); ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<?php require('topbar.php'); ?>

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800">New Prduct</h1>
					<div class="border-left-primary">
						<div class="container">
							<form method="POST" enctype="multipart/form-data" action="<?php echo base_url() . 'Product/findData' ?>" class="needs-validation">
								<div class="form-row">
									<div class="form-group col-md-8">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="productName">Pruduct Name</label>
												<input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" required>
											</div>
											<div class="form-group col-md-6">
												<label for="productDescription">Description</label>
												<textarea class="form-control" id="description" placeholder="Product Description" name="description" required></textarea>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="price">Price</label>
												<input class="form-control" id="price" placeholder="0.00" name="price" type="number" step="0.01" min="0.01" max="100000" required>
											</div>
											<div class="form-group col-md-4">
												<label for="catagory">catagory</label>
												<select class="form-control" name="catagory" required>
													<option value="" disabled selected hidden>----Catagory----
													</option>
													<?php foreach ($catagories as $c) { ?>
														<option value="<?php echo $c['id']; ?>">
															<?php echo $c['categoryName']; ?>
														</option>
													<?php  } ?>
												</select>
											</div>
											<div class="form-group col-md-4">
												<label for="brand">Brand</label>
												<select class="form-control" name="brand" required>
													<option value="" disabled selected hidden>----Brand----
													</option>
													<?php foreach ($brands as $b) { ?>
														<option value="<?php echo $b['id']; ?>">
															<?php echo $b['brandName']; ?>
														</option>

													<?php  } ?>
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Cover</label>
												<img style="max-width: 180px; border-radius: 5px;" id="cover" src="<?php echo base_url() . 'upload/download.png'; ?>" alt="your image" />
												<input style="max-width: 180px; border-radius: 5px; max-height: 50px" id="coverImage" type="file" accept="image/png/jpg/jpeg" name="coverImage" onchange="readURL(this,'cover');" style="margin-left: 50px" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label>Detail Image 1</label>
												<img style="max-width: 180px; border-radius: 5px;" id="detail1" src="<?php echo base_url() . 'upload/download.png'; ?>" alt="your image" />
												<input style="max-width: 180px; border-radius: 5px; max-height: 50px" id="detailImage1" type="file" accept="image/png/jpg/jpeg" name="detailImage1" onchange="readURL(this,'detail1');" style="margin-left: 50px" required>
											</div>
											<div class="form-group col-md-4">
												<label>Detail Image 2</label>
												<img style="max-width: 180px; border-radius: 5px;" id="detail2" src="<?php echo base_url() . 'upload/download.png'; ?>" alt="your image" />
												<input style="max-width: 180px; border-radius: 5px; max-height: 50px" id="detailImage2" type="file" accept="image/png/jpg/jpeg" name="detailImage2" onchange="readURL(this,'detail2');" style="margin-left: 50px" required>
											</div>
											<div class="form-group col-md-4">
												<label>Detail Image 3</label>
												<img style="max-width: 180px; border-radius: 5px;" id="detail3" src="<?php echo base_url() . 'upload/download.png'; ?>" alt="your image" />
												<input style="max-width: 180px; border-radius: 5px; max-height: 50px" id="detailImage3" type="file" accept="image/png/jpg/jpeg" name="detailImage3" onchange="readURL(this,'detail3');" style="margin-left: 50px" required>
											</div>
										</div>
									</div>

								</div>
								<button type="submit" class="btn btn-primary">Done</button>
							</form>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<?php require('footbar.php'); ?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->


	<?php require('foot.php'); ?>

</body>

</html>
