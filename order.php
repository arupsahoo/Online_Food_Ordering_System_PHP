<?php include('partials-front/menu.php'); ?>
<?php include('login-check.php'); ?>

<?php
        // Check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
           // echo "button clicked";
           $food_title = $_POST['food_title'];
           $price = $_POST['price'];
           $qty = $_POST['qty'];
           $total = $price * $qty;
           $order_date = date("Y-m-d h:i:sa"); // order date
           $status = "ordered"; // ordered, dispatched, delivered, cancelled

           $c_name = $_POST['full-name'];
           $c_contact = $_POST['contact'];
           $c_email = $_POST['email'];
           $c_address = $_POST['address'];
           $user_id = $_SESSION['user_id'];

           // save the data into the database
           $sql2 = "INSERT INTO tbl_order SET 
                    food_title = '$food_title',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    c_name = '$c_name',
                    c_contact = '$c_contact',
                    c_email = '$c_email',
                    c_address = '$c_address',
                    user_id = $user_id ";
            $res2 = mysqli_query($conn, $sql2);
            if($res2)
            {
                // ordered successfully
                $_SESSION['order'] = 
                "<div class = 'success text-center'>Your order placed successfully</div>";
                header('location:'.SITEURL);

            }       
            else
            {
                $_SESSION['order'] = 
                "<div class = 'error text-center'> Failed to order food</div>";
                header('location:'.SITEURL);
            } 
        }
        ?>

     <!-- fOOD sEARCH Section Starts Here -->
     <section class="order-food">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <?php
          
          if(isset($_GET['food_id']))
          {
              $food_id = $_GET['food_id'];
              $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
              $res = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($res);
          
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              $price = $row['price'];
              $description = $row['description'];
          
          }
          ?>        

                    <div class="food-menu-img">
                    <?php
             if($image_name != '')
             {
               ?>
               <img src="<?php echo SITEURL; ?>images/foods/<?php echo $image_name; ?>" 
               alt="<?php echo $title; ?>" 
                class="img-curve img-responsive">
               
    
               <?php
             /*
             This method not working -
             
             echo  '<img src="SITEURL./images/foods/.$image_name" 
                alt=" $title" 
                 class="img-curve img-responsive">';
      */
            }
             else
             {
                echo "<div> Image not available </div>";
             }
                ?>             
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food_title" value="<?php echo $title; ?>">
                        <p class="food-price">₹ <?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter your full name here" 
                    class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" 
                    class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country"
                     class="input-responsive" required></textarea>

                  
                     <input type="radio" name="cod" value="cod" checked>
                     <label for="cod">Cash On Delivery</label>
                    
                     <br> <br>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>