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

                        <?php
                        switch($page)
                        {
                            case 'categories':
                                include './includes/views/forms/categories.php';
                                break;
                            case 'posts':
                                    include './includes/views/forms/posts.php';
                                    break;


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

