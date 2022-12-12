<?php include('partials-front/menu.php'); ?>
<?php include('login-check.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	</head>

<body>
 
<div class="myorderbg"> </div>

<div class="myorder">
    <?php
if(isset($_SESSION['delete-order']))
{
  echo $_SESSION['delete-order'];
  unset($_SESSION['delete-order']);
}

?>
    <table >
        <tr>
            <th>SNO</th>
            <th>item</th>
            <th>Quantity</th>
            <th>Total price</th>
            <th>status</th>
            <th>date</th>
            <th>action</th>
        </tr>

        <?php 
        $sql = "SELECT * FROM tbl_order WHERE user_id='".$_SESSION['user_id']."'";
        $res = mysqli_query($conn, $sql);
		if(!mysqli_num_rows($res) > 0 )
				{
					echo '<div class="error">You have No orders Placed yet. </div>';
				}
			else
				{			      
  
  while($row = mysqli_fetch_array($res))
     {
     $status = $row['status'];
        $n = 1;
 ?>
    <tr>
        <td><?php echo $n++; ?></td>
        <td><?php echo $row['food_title']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><?php echo $row['total']; ?></td>
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
        <td><?php echo $row['order_date']; ?></td>
        <td>
             <a href="delete-orders.php?user_id=<?php echo $row['user_id']; ?>" 
        onclick="return confirm('Are you sure you want to cancel your order?');" >
        Delete Order</a> 
        </td>
    </tr>

    <?php

     }
    }
?>
</table>
</div>


    <div class="clearfix"></div>
    
<?php include('partials-front/footer.php'); ?>

						
