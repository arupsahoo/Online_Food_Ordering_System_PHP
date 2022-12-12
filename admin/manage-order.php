<?php include('partials/menu.php') ?>
<div class="main-content">
    <div style="width: 95%; margin: auto;">
    <h1>
        Manage Order
    </h1>

    <?php 
    if(isset($_SESSION['update-order']))
    {
      echo $_SESSION['update-order'];
      unset($_SESSION['update-order']);
    }
    if(isset($_SESSION['delete-order']))
    {
      echo $_SESSION['delete-order'];
      unset($_SESSION['delete-order']);
    }
    ?>

    
    <table class="tbl-full admin-order">
        <tr>
            <th>SNO</th>
            <th>Food</th>
            <th>price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Order_Date</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
            
        </tr>
        <?php 
          $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          if($count > 0)
          {
            $n = 1;
            // data found
            while($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                /* $food_title = $row['food_title'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $order_date = $row['order_date']; */
                $status = $row['status'];
                ?>
         <tr>
            <td><?php echo $n++; ?></td>
            <td><?php echo $row['food_title']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td>

              <?php 
              if($status == "ordered")
              echo "<label style='color: pink;'> $status</label>";
              if( $status== "dispatched")
              echo "<label style='color: yellow;'>$status</label>";
              if( $status== "ontheway")
              echo "<label style='color: blue;'>$status</label>";
              if($status== "delivered")
              echo "<label style='color: green'>$status</label>";
              if($status == "cancelled")
              echo "<label style='color: red;'>$status</label>";
              ?>

            </td>
            <td><?php echo $row['c_name']; ?></td>
            <td><?php echo $row['c_contact']; ?></td>
            <td><?php echo $row['c_email']; ?></td>
            <td><?php echo $row['c_address']; ?></td>
            <td><a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?> " 
            class="btn-secondary">Update order</a> </td>
        </tr>

                <?php

            }
          }
          else
          {
            echo "<div class='error'> No orders found</div>";
          }
        ?>
       
       

       
    </table>
    </div>
    </div>
<?php include('partials/footer.php') ?>