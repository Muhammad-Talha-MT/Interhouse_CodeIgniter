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
                            <form method="POST" enctype="multipart/form-data"
                                action="<?php echo base_url() . 'banner/newBanner' ?>" class="needs-validation">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="bannerName">Banner Name</label>
                                                <input type="text" class="form-control" id="bannerName"
                                                    placeholder="Banner Name" name="bannerName" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bannerTitle">Banner Title</label>
                                                <input type="text" class="form-control" id="bannerTitle"
                                                    placeholder="Banner Title" name="bannerTitle" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Image</label>
                                                <img style="max-width: 180px; border-radius: 5px;" id="image"
                                                    src="<?php echo base_url() . 'upload/download.png'; ?>"
                                                    alt="your image" />
                                                <input style="max-width: 180px; border-radius: 5px; max-height: 50px"
                                                    id="images" type="file" accept="image/png" name="image"
                                                    onchange="readURL(this,'image');" style="margin-left: 50px"
                                                    required>
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