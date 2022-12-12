
<?php  include('partials/menu.php'); ?>
    <!-- Menu section ends here -->

   

    <!-- Main-content section starts here -->
    <div class="main-content">
    <div class="wrapper">
       
        <h1 class="text-center">Dashboard</h1>
        <?php
             if(isset($_SESSION['login'])){
                echo $_SESSION['login']; // Displaying message
                unset($_SESSION['login']); // removing message
             }
            ?>
        <div class="col-4  text-center">
            <?php
            $sql5 = "SELECT * FROM users";
            $res5 = mysqli_query($conn, $sql5);
            $count5 = mysqli_num_rows($res5);
            ?>
            <h1><?php echo $count5; ?></h1> <br>
            Users
        </div>

        <div class="col-4  text-center">
            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1> <br>
         Categories
        </div>

        <div class="col-4  text-center">
        <?php
            $sql2 = "SELECT * FROM tbl_food";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?></h1> <br>
            Foods
        </div>
        <div class="col-4  text-center">
        <?php
            $sql3 = "SELECT * FROM tbl_order";
            $res3 = mysqli_query($conn, $sql3);
            $count3 = mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1> <br>
            Total orders
        </div>
        <div class="col-4  text-center">
        <?php
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order
             WHERE status = 'delivered'";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_assoc($res4);
            $total_sell = $row4['Total'];

            ?>
            <h1> ₹ <?php echo $total_sell; ?></h1> <br>
           Total Amount Of Sell 
        </div>
        <div class="clearfix"></div>
     
       </div>
    </div>
    <!-- Main content section ends here -->

   <?php include('partials/footer.php');