


<div class="col-md-4">

    <!-- Login -->
    <div class="well">
        <h4>Login</h4>
        <form action="" method="post">
            <div class="input-group">

                <input name="username" type="text" class="form-control" placeholder="username">

                <input name="password" type="text" class="form-control" placeholder="password">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="login">
                                login
                        </button>
                        </span>
            </div>
        </form>
    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>

        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    $query = "SELECT * FROM `categories`";
                    $select_all_categories = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_categories))
                    {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='#'>$cat_title</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">hello</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
