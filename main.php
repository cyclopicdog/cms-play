<?php
include ('./includes/views/header.php');

include ('./includes/views/navigation.php');
?>



    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php
            include('./includes/views/sidebar-controller.php');

            ?>






            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        include ('./includes/views/sidebar.php');
        ?>
    </div>
    <!-- /.row -->

    <hr>

<?php

include ('./includes/views/footer.php');