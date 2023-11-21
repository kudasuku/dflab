<?php

//set session message
function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['MESSAGE'] = $msg;
    }
    else
    {
        $msg = "";
    }
}
//display message
function display_message()
{
    if(isset($_SESSION['MESSAGE']))
    {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}

//error message
function display_error($error)
{
   return "<span class='alert alert-danger text-center'>$error</span>";
}

//success message
function display_success($success)
{
    return "<span class='alert alert-success text-center'>$success</span>";
}
//get safe value 
function safe_value($con,$value){
    return mysqli_real_escape_string($con,$value);
}

//login check
function login_system()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login']))
{
    global $con;
    $username = safe_value($con,$_POST['username']);
    $password = safe_value($con,$_POST['password']);

    if(empty($username) || empty($password))
    {
        set_message(display_error("Please fill in the blanks"));
    }
    else
        {
        //query
        $query = "select * from users where username='$username' or email='$username' AND password = '$password'";
        $result = mysqli_query($con,$query);

        if(mysqli_fetch_assoc($result))
        {
            
            header("location: ./dashboard.php");
        }
        else
        {
            set_message(display_error("You're entered wrong df admin password,username or email"));
        }

        }
}
}


//add category
function add_category()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_btn']))
    {
        global $con;
        $category = safe_value($con,$_POST['category']);

        if(empty($category))
        {
            set_message(display_error("Please enter category name"));
        }  
        else
        {
           $sql = "select * from categories where cat_name='$category'";
           $check = mysqli_query($con,$sql);
           if(mysqli_fetch_assoc($check))

           {
            set_message(display_success("category already exists !! "));
           }
           else
           {
            $query = "insert into categories(cat_name,status) values ('$category','1')";
            $result = mysqli_query($con,$query);
            if($result)
            {
                set_message(display_success("Category saved in database"));
                echo "<a href='manage_category.php'>View Category</a>";
                echo"<br><br>";
            }
           }
        }
    }
}

//view category
function view_cat()
{
    global $con;
    $sql = "select * from categories";
    return mysqli_query($con,$sql);
}

//active & deactive
function active_status()
{
    global $con;
    if(isset($_GET['opr']) && $_GET['opr']!="")
    {
        $operation = safe_value($con,$_GET['opr']);
        $id = safe_value($con,$_GET['id']);

        if($operation=='active')
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }
        $query = "update categories set status='$status' where id='$id'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:manage_category.php");
        }

    }
    
}

//update Category
function update_cat()
{
    global $con;
    if(isset($_POST['cat_btn_up']))
    {
        $category_name = safe_value($con,$_POST['category_up']);
        $id = safe_value($con,$_POST['cat_id']);
        
        if(!empty($category_name))
        {
            $sql = "update categories set cat_name='$category_name' where id='$id'";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                header("location:manage_category.php");
            }
        }
    }
}

//=============================================================== PRODUCT PAGES =================================================================================

function save_products()
{
    global $con;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST ['pro_btn']))
    {
        $cat_id = safe_value($con,$_POST['cat_id']);
        $product_name = safe_value($con,$_POST['product_name']);
        $mrp = safe_value($con,$_POST['mrp']);
        $price = safe_value($con,$_POST['price']);
        $qty = safe_value($con,$_POST['qty']);
        $desc = safe_value($con,$_POST['desc']);

        $img = $_FILES['img']['name'];
        $type = $_FILES['img']['type'];
        $tmp_name= $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];

        $img_ext = explode('.',$img);
        $img_correct_ext = strtolower(end($img_ext));
        $allow = array('jpg','png','jpeg','webp');
        $path = "img/".$img;

        if(in_array($img_correct_ext,$allow))
        {
            if($size<50000)
            {
               if($cat_id == 0)
               {
                set_message(display_error("Please enter category !! ")); 
               }
               else
               {
                $query = "insert into products (category_name,product_name,MRP,price,qty,img,description,status) values('$cat_id','$product_name','$mrp','$price','$qty','$img','$desc','1')";
                $result = mysqli_query($con,$query);
               
                if($result)
                {
                    set_message(display_success("Products saved in database"));
                    move_uploaded_file($tmp_name,$path);
                }
               }
            }
           
        }
        else
        {
            set_message(display_error("You're entered those file format "));   
        }

    }

}

//view products

function view_products()
{
    global $con;
    $query = "SELECT products.p_id, categories.cat_name, products.product_name, products.MRP, products.price, products.qty, products.img, products.description, products.status from products INNER JOIN categories on products.category_name = categories.id;";
    return $result = mysqli_query($con,$query);

}

//function active deactive product
//active & deactive
function active_status_product()
{
    global $con;
    if(isset($_GET['opr']) && $_GET['opr']!="")
    {
        $operation = safe_value($con,$_GET['opr']);
        $id = safe_value($con,$_GET['id']);

        if($operation=='active')
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }
        $query = "update products set status='$status' where p_id='$id'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:manage_product.php");
        }

    }
    
}

?>