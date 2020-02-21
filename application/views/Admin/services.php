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
                    <h1 class="h3 mb-2 text-gray-800">services</h1>
                    <p class="mb-4">This is all services Data </p>
                    <div class="">
                        <a href="<?php echo base_url() . 'service/add' ?>" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus right"></i>
                            </span>
                            <span class="text">New service</span>
                        </a>
                    </div><br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">service Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>service Name</th>
                                            <th>service description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Picture</th>
                                            <th>service Name</th>
                                            <th>service description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($services as $b) { ?>
                                        <tr>
                                            <td><img class="img-thumbnail" style="width:200px ; heigh:200px"
                                                    src="<?php echo base_url() . 'upload/services/' . $b['image']; ?>"
                                                    alt="No Picture"></td>
                                            <td><?php echo $b['name']; ?></td>
                                            <td><?php echo $b['description']; ?></td>
                                            <td><a href="<?php echo base_url() . 'service/goToEditservice/' . $b['id'] ?>"
                                                    class="btn btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td><a href="<?php echo base_url() . 'service/deleteservice/' . $b['id'] ?>"
                                                    class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>
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