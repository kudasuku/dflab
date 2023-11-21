<?php
require_once 'inc/header.php';
active_status();
$value = view_products();
active_status_product();
?>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/nav.php'; ?>

<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">MANAGE PRODUCTS</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">DF LAB DATA TABLE</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Products</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <tbody>  
                        <thead>
                                <tr>
                                    <th>PRODUCT ID</th>
                                    <th>CATEGORY NAME</th>
                                    <th>PRODUCT NAME </th>
                                    <th>MRP</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>IMAGE</th>
                                    <th>DESCRIPTION</th>
                                    <th>STATUS</th>
                                    <th colspan="3">OPERATIONS</th>
                                </tr>
                                <tr>
                                <?php
                                while ($row=mysqli_fetch_assoc($value)) 
                                {
                                    ?>
                                    <td><?php echo $row['p_id']; ?> </td>
                                    <td><?php echo $row['cat_name']; ?> </td>
                                    <td><?php echo $row['product_name']; ?> </td>
                                    <td><?php echo $row['MRP']; ?> </td>
                                    <td><?php echo $row['price']; ?> </td>
                                    <td><?php echo $row['qty']; ?> </td>
                                    <td><img src="img/<?php echo $row ['img']?>" width="80px" height="80px" class="img-circle" alt=""></td>
                                    <td><?php echo $row['description']; ?> </td>
                                    <td><?php echo $row['status']; ?> </td>

                                    <td>
                                    <?php 

                                    if ($row['status'] == '1')
                                    {
                                        echo "Active";
                                    }
                                    else
                                    {
                                        echo "Deactive";
                                    }
                                    
                                    ?> 
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($row['status'] == '1')
                                        {
                                            echo "<a href='manage_product.php?opr=deactive&id=".$row['p_id']."' class='btn btn-success'>Deactive</a>";
                                        }
                                        else
                                        {
                                            echo "<a href='manage_product.php?opr=active&id=".$row['p_id']."' class='btn btn-success'>Active</a>";
                                        }
                                        ?>
                                        <a href="edit_product.php?id= <?php echo $row['p_id']?>" class="btn btn-primary">Edit</a>
                                        <a href="del_product.php?id= <?php echo $row['p_id']?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                
                                <?php
                                }
                                ?>
        
                            </thead>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>DFLAB </b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
        
<?php require_once 'inc/footer.php'; ?>
