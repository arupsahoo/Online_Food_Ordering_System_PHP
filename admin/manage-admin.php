<?php include('partials/menu.php'); ?>



    <!-- Main-content section starts here -->
    <div class="main-content">
    <div class="wrapper">
    <h1>
        Admin Manage
    </h1>
<?php 
if(isset($_SESSION['pwd-change'])){

    echo $_SESSION['pwd-change']; // Displaying message
    unset($_SESSION['pwd-change']); // removing message
}
if(isset($_SESSION['add'])){

    echo $_SESSION['add']; // Displaying message
    unset($_SESSION['add']); // removing message
}
if(isset($_SESSION['delete'])){

    echo $_SESSION['delete']; // Displaying message
    unset($_SESSION['delete']); // removing message
}
if(isset($_SESSION['update'])){

    echo $_SESSION['update']; // Displaying message
    unset($_SESSION['update']); // removing message
}
?>

<br> <br> <br>
    <a href="add-admin.php" class="btn-primary"> Add Admin </a>
    <br> <br>

    <table class="tbl-full">
        <tr>
            <th>SNO</th>
            <th>Full name</th>
            <th>username</th>
            <th>Actions</th>
        </tr>

        <?php
        // DIsplaying data in database
        $sql = " SELECT * FROM `tbl_admin`";
        $res = mysqli_query($conn, $sql);
        if($res){
            // count number of rows
            $count = mysqli_num_rows($res);
            
         $n = 1;
            if($count > 0){
                while($rows = mysqli_fetch_assoc($res)){
                    
                $id = $rows['id'];
                $full_name = $rows['full_name'];
                $username = $rows['username'];

                // Displaying data
                ?>
                <tr>
            <td><?php echo $n++ ?></td>
            <td><?php echo $full_name ?></td>
            <td><?php echo $username ?></td>
            <td>
            <a href="update-admin.php?id=<?php 
               echo $id; ?> " class="btn-secondary">Update</a>
               <a href="delete-admin.php?id=<?php 
               echo $id; ?>" class="btn-danger">Delete</a>  
               <a href="update-password.php?id=<?php 
               echo $id; ?>" class="btn-primary">Change Password</a>  
            </td>
        </tr>
        <?php
       /*  <?php  echo SITEURL; ?>admin/update-admin.php? id= <?php 
        echo $id; ?> */
         
                }
            }
        }
        ?>

        
        
    </table>
    </div>
    </div>
    <!-- Main content section ends here -->

    <?php include('partials/footer.php'); ?>