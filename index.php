<?php include('partials-front/menu.php'); ?>
   <!-- Food search section starts here -->
   <!--  <section class="food-search text-center" >
        <div class="container ">
           <form action="<?php echo SITEURL; ?>food-search.php" method= "POST">
            <input type="search" name="search" placeholder="Search foods here" required>
            <input type="submit" name="submit" value="search" class="btn btn-primary">
           </form>
            </div>

    </section> -->
    <!-- Food search section ends here -->
    <?php
    if(isset($_SESSION['login']))
    {
     ?>
        <div class="alert alert-dismissible fade show alert-success success" role="alert">
  <strong>Success!</strong> <?php echo $_SESSION['login']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['login']);
    }
    
    if(isset($_SESSION['order']))
    {
       echo $_SESSION['order']; 
       unset($_SESSION['order']);
    }
    if(isset($_SESSION['logout']))
    {
       echo $_SESSION['logout']; 
       unset($_SESSION['logout']);
    }
   
    
    ?> 
    
 <section class= "food-search text-center">
  <div class="container">
  <form action="<?php echo SITEURL; ?>food-search.php" method= "POST">
            <input type="search" name="search" placeholder="Search foods here" required>
            <input type="submit" name="submit" value="search" class="btn btn-primary">
           </form>
  </div>
 

 </section>
    

 

     <!-- Categories section starts here -->
     <section class="Categories slider" >
        <div class="container">
            <h2 class="text-center">Our Featured Food Categories</h2>
    <?php 
      // Getting data from the database and displaying it here
      $sql = "SELECT * FROM tbl_category WHERE active = 'on' AND featured = 'on' LIMIT 3";
      $res = mysqli_query($conn, $sql);
      
      // counting the number of rows
      $count = mysqli_num_rows($res);
      if($count > 0)
      {
        // Display categories here using while loop
        while($row =  mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['img_name'];

            ?>
              <a href="<?php echo SITEURL; ?>category-food.php?category_id=
              <?php echo $id; ?>">
            <div class="box3 float-container">
                <?php
                if($image_name != '')
                {
                  ?>  
             <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>" 
             alt="<?php echo $title; ?>" class="img-responsive img-curve">
               <?php
                }
                else
                echo "<div>Image not available</div>";
                ?>

               <h3 class="float-text text-white"><?php echo $title; ?></h3>
               </div>
            </a>

            <?php
        }

      }
      else
      {
        echo "<div class='error'>No categories availble</div>";
      }

    ?>
     <p class="text-center">
            <a href="<?php echo SITEURL; ?>categories.php">See All Categories</a>
        </p>

           <div class="clearfix"></div>
            </div>

    </section>
    <!-- Categories section ends here -->

    <!-- 3 steps section starts here  -->
<section class="steps">


</section>


    <!-- 3 steps section starts here  -->



     <!-- Food menu section starts here -->
     <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food menu</h2>

            <!-- php code to retrive data from database -->

            <?php 
      // Getting data from the database and displaying it here
      $sql2 = "SELECT * FROM tbl_food WHERE active = 'on' AND featured = 'on' LIMIT 8";
      $res2 = mysqli_query($conn, $sql2);
      
      // counting the number of rows
      $count2 = mysqli_num_rows($res2);
      if($count2 > 0)
      {
        // Display categories here using while loop
        while($row =  mysqli_fetch_assoc($res2))
        {
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];
            $price = $row['price'];
            $description = $row['description'];


            ?>
             <!-- Food box lists starts here -->
      <div class="food-menu-box">
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
          <div class="food-menu-desc content">
       
          <h4> <?php echo $title; ?> </h4>
          <p class="food-price">₹ <?php echo $price; ?></p> 
           <div class="hideContent" >
          <p class="food-details" id="icon"><?php echo $description; ?></p>
         
        </div>
     
        


     
           <br>
          <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>"
           class="btn btn-primary">Order now</a>
          </div>
      </div>
      <!-- Food box lists ends here -->
         <?php
        }

      }
      else
            {
        echo "<div class='error'>No foods availble</div>";
      }

    ?>
 
            <div class="clearfix"></div>

           
            <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- Food menu section ends here -->

   

   



     <?php include('partials-front/footer.php'); ?>