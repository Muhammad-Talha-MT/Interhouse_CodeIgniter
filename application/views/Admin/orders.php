<!DOCTYPE html>
<html lang="en">

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
					<h1 class="h3 mb-2 text-gray-800">Orders</h1>
					<p class="mb-4">New Orders </p>
					<!-- <div class="">
						<a href="<?php echo base_url() . 'Product/add' ?>" class="btn btn-primary btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-plus right"></i>
							</span>
							<span class="text">New </span>
						</a>
					</div><br> -->

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Orders Data</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Order Id</th>
											<th>User Name</th>
											<th>Date</th>
											<th>Grand Total</th>
											<th>Status</th>
											<th>Detail</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Order Id</th>
											<th>User Name</th>
											<th>Date</th>
											<th>Grand Total</th>
											<th>Status</th>
											<th>Detail</th>
											<th>Delete</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
										$Counter = 1;
										foreach ($Order_list as $order) {

										?>
											<tr class="order_list">

												<td><?php echo $order['orderid']; ?></td>
												<td><?php echo $order['userId']; ?></td>
												<td><?php echo $order['orderDate']; ?></td>
												<td><?php echo $order['grandTotal']; ?></td>
												<td class="dropdown">
													<input type="hidden" value="<?php echo $order['userId']; ?>" name="userid" id="userid">
													<div class="btn-group">
														<p class="badge badge-pill badge-success btn dropdown-toggle status" data-toggle="dropdown">
															<?php echo $order['status']; ?>
														</p>
														<ul class="dropdown-menu">
															<li class="select"><a>Pending</a></li>
															<li class="select"><a>Shipped</a></li>
															<li class="select"><a>Completed</a></li>
														</ul>
													</div>
												</td>
												<td><a href="<?php echo base_url() . 'Order/detail/' . $order['orderid']; ?>" class="btn btn-info">Detail</a></td>
												<td><a href="<?php echo base_url() . 'Order/delete/' . $order['orderid']; ?>" class="btn btn-danger">Delete</a></td>
											</tr>

										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<?php require('footbar.php'); ?>

		</div>
		<!-- End of Content Wrapper -->




		<?php require('foot.php'); ?>

</body>

</html>
