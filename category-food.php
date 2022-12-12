<?php include('partials-front/menu.php'); ?>
<?php 

if(isset($_GET['category_id']))
{
    $category_id = $_GET['category_id'];
    // echo $category_id;
    $sql = "SELECT title FROM tbl_category WHERE id = $category_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    // Get the title
    $category_title = $row['title'];
     $category_id;
}
else
{
    // Redirect to home page
    header("location:".SITEURL);
}
?>

     <!-- fOOD sEARCH Section Starts Here -->
     <section class="search-bar text-center">
        <div class="container">
            
            
            <h2>Foods on  <a href="#" class="text-green">
                "<?php echo $category_title; ?>"
            </a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- Food menu section starts here -->
    <section class="food-menu">
        <div class="container">

        <?php
          

          // SQL query to get foods based on search keyword
          $sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id ";
         $res2 = mysqli_query($conn, $sql2);

         $count2 = mysqli_num_rows($res2);
         if($count2 > 0)
         {
            // Food available based on search
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
              <div class="food-menu-desc">
              <h4> <?php echo $title; ?> </h4>
              <p class="food-price">₹ <?php echo $price; ?></p> 
              <p class="food-details"><?php echo $description; ?></p><br>
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
            // Food not availble
            echo "<div class='error'> Sorry! There is no food available in this category</div>";
         }

        ?>

        </div>
            <div class="clearfix"></div>

    </section>
    <!-- Food menu section ends here -->

    <?php include('partials-front/footer.php'); ?>