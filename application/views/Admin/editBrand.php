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
                    <h1 class="h3 mb-4 text-gray-800">Edit Brand</h1>
                    <div class="border-left-primary">
                        <div class="container">
                            <form method="POST" enctype="multipart/form-data"
                                action="<?php echo base_url() . 'Brand/editBrand/' . $brand['id'] ?>"
                                class="needs-validation">
                                <div class="form-row">

                                    <div class="form-group col-md-8">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="studentName">Brand Name</label>
                                                <input type="text" class="form-control" id="brandName"
                                                    placeholder="Brand Name" name="brandName"
                                                    value="<?php echo $brand['brandName']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fatherName">Description</label>
                                                <textarea class="form-control" id="description"
                                                    placeholder="Brand Description" name="description"
                                                    value="<?php echo $brand['brandDescription']; ?>"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="studentName">MetaTitle</label>
                                                <input type="text" class="form-control" id="metaTitle"
                                                    placeholder="Meta Title" name="metaTitle"
                                                    value="<?php echo $brand['metaTitle']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="fatherName">Description</label>
                                                <textarea class="form-control" id="metaDescription"
                                                    placeholder="Meta Description" name="metaDescription"
                                                    value="<?php echo $brand['metaDescription']; ?>"
                                                    required></textarea>

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