
<?php require_once 'inc/header.php'; ?>
<?php 
require_once 'inc/nav.php';
$cat = view_cat()
?>

        <div class="content-wrapper">
            <div class="page-content fade-in-up">

            <!-- START PAGE CONTENT-->
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Products</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Add Products</label>
                                <?php save_products(); ?>
                            </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <select name="cat_id" id="" class="form-control">
                                        <option value="">Category</option>
                                        <?php

                                        while ($row = mysqli_fetch_assoc($cat))
                                        {
                                            ?>
                                            <option value=" <?php echo $row ['id']?>"><?php echo $row['cat_name'] ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="product_name" placeholder="enter product name" required>
                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="mrp" placeholder="enter product mrp" required>
                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="price" placeholder="enter product price" required>
                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="qty" placeholder="enter product quantity" required>
                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" type="text" name="img" required>
                                </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-10">
                                    <textarea id="" cols="30" rows="10" class="form-control" placeholder="enter product description" name="desc"></textarea>
                                </div>
                            
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit" name="pro_btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container">
                    <div class="row">
                    <div class="col">
                    <?php 
                         display_message();
                    ?>
                    </div>
                </div>
            </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>DFLAB</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
<?php require_once 'inc/footer.php'; ?>