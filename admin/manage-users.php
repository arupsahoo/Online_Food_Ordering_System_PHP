<?php include('partials/menu.php'); ?>



    <!-- Main-content section starts here -->
    <div class="main-content">
    <div class="wrapper">
        
    <h1>
        Users
    </h1>
    <?php
          if(isset($_SESSION['update-user']))
          {
            echo $_SESSION['update-user'];
            unset($_SESSION['update-user']);
          }
          if(isset($_SESSION['delete-user']))
          {
            echo $_SESSION['delete-user'];
            unset($_SESSION['delete-user']);
          }
        ?>
   

    <table class="tbl-full">
        <tr>
            <th>SNO</th>
            <th>Full name</th>
            <th>email</th>
            <th>contact</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        <?php
        // DIsplaying data in database
        $sql = " SELECT * FROM users ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);
        if($res){
            // count number of rows
            $count = mysqli_num_rows($res);
            
         $n = 1;
            if($count > 0){
                while($rows = mysqli_fetch_assoc($res)){
                    
                $id = $rows['id'];
                $full_name = $rows['full_name'];
                $email = $rows['email'];
                $contact = $rows['contact'];
                $date = $rows['date'];

                // Displaying data
                ?>
                <tr>
            <td><?php echo $n++ ?></td>
            <td><?php echo $full_name ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $contact ?></td>
            <td><?php echo $date ?></td>
            <td>
            <a href="update-users.php?id=<?php 
               echo $id; ?> " class="btn-secondary">Update</a>
               <a href="delete-users.php?id=<?php 
               echo $id; ?>" class="btn-danger">Delete</a>  
              
            </td>
        </tr>
        <?php
       /*  <?php  echo SITEURL; ?>admin/update-admin.php? id= <?php 
        echo $id; ?> */
         
                }
            }
            else
            echo '<div class="error"> No users found!</div>';
        }
        ?>

        
        
    </table>
    </div>
    </div>
    <!-- Main content section ends here -->

    <?php include('partials/footer.php'); ?>