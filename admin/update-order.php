<?php include('partials/menu.php') ?>
<?php
    // checking whether the button is clicked or not
    if(isset($_POST['submit']))
    {
       // echo "button clicked";
       $qty = $_POST['qty'];
       $status = $_POST['status'];
       $price = $_POST['price'];
       $total = $price * $qty;
       $id = $_POST['id'];

       $sql2 = "UPDATE tbl_order SET
                qty = $qty,
                total = $total,
                status = '$status',
                price = $price WHERE id = $id"; 
        $res2 = mysqli_query($conn, $sql2);
        if($res2)
        {
            $_SESSION['update-order'] = "<div class='success'>Order updated successfully</div>";
            header("location:".SITEURL."admin/manage-order.php");
        }   
        else
        {
            // Redirect to manage order with error message
            $_SESSION['update-order'] = "<div class='error'>Failed to update order</div>";
            header("location:".SITEURL."admin/manage-order.php");
        }     
    }
    ?>
 


<?php
if(isset($_GET['id'])){
 // 1- Get the id of the adimin for update
 $id = $_GET['id'];
}

 // 2 - sql query to retrive data from database
 $sql = "SELECT * FROM tbl_order WHERE id = $id";
  $res= mysqli_query($conn, $sql);
 if($res){
     $count = mysqli_num_rows($res);

    if($count == 1){
        // Get details
       // echo "Admin available";
        $row = mysqli_fetch_assoc($res);
        $food_title = $row['food_title'];
        $price = $row['price'];
         $qty = $row['qty']; 
         $total = $row['total'];
         $order_date = $row['order_date'];
        $status = $row['status'];

        $c_name = $row['c_name'];
        $c_contact = $row['c_contact'];
        $c_email = $row['c_email'];
        $c_address = $row['c_address'];

    }
    else{
        // Redirect to manage admin page
        header("location:".SITEURL."/admin/manage-order.php");
    }
 }
 ?>

<div class= "main-content">
 <div class="wrapper">
    <h1> Update Order </h1>
    
    <form action="" method="POST">
        <div class="float-form">
        Food name: <br>
       <b> <?php echo $food_title; ?> </b> <br> <br>

        Price: <br>
        <b>₹ <?php echo $price; ?> </b><br> <br>
        


        Total: <br>
       <b> ₹ <?php echo $total; ?> </b> <br> <br>

        Order date: <br>
        <b><?php echo $order_date; ?></b> <br> <br>

        Customer name: <br>
        <b><?php echo $c_name; ?></b> <br> <br>

        Customer Contact: <br>
        <b><?php echo $c_contact; ?></b> <br> <br>

       Customer email: <br>
       <b> <?php echo $c_email; ?></b> <br> <br>

       Customer Address>: <br>
        <b><?php echo $c_address; ?></b> <br> <br>
        </div>





        <div class="float-form">
        Quntity: <br>
        <input type="number" name="qty" value="<?php echo $qty; ?>"> <br> <br>

        <input type="hidden" name="price" value="<?php echo $price ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        Status: <br>
        <select name="status" id="">
            <option <?php if($status == "ordered"){echo 'selected';} ?> 
            value="ordered">Ordered</option>
            <option <?php if($status == "ordered"){echo 'selected';} ?>
            value="dispatched">Dispatched</option>
            <option <?php if($status == "ontheway"){echo 'selected';} ?>
            value="ontheway">On the way!</option>
            <option <?php if($status == "delivered"){echo 'selected';} ?>
            value="delivered">Delivered</option>
            <option <?php if($status == "cancelled"){echo 'selected';} ?>
            value="cancelled">Cancelled</option>
        </select>
        <br> <br> <br>
        <input type="submit" name="submit" value="Update order" 
            class="btn-secondary ">
        </div>
        <div class="clearfix"></div>
    </form>
    </div>   
</div>

    
<?php include('partials/footer.php') ?>