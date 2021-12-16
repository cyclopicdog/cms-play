<?php
// ob_start();

include './includes/views/default/header.php';

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

?>



    <div id="wrapper">

        <!-- Navigation -->
        <?php

        include './includes/views/default/navigation.php';
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <?php
                        if($page == 'categories')
                        {
                            include './includes/views/forms/categories.php';
                        }
                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include './includes/views/default/footer.php';
    ?>

