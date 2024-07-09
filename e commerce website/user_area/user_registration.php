<?php
include('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registraion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- font awsome link -->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">New User Registraion</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
               <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" 
                    autocomplete="off" required="required" name="user_username">
                </div>
<!-- email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" 
                    autocomplete="off" required="required" name="user_email">
                </div>
<!-- img -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">Image</label>
                    <input type="file" id="user_image" class="form-control"  
                     required="required" name="user_image">
                </div>
<!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" 
                    autocomplete="off" required="required" name="user_password">
                </div>
<!-- conf -->
                <div class="form-outline mb-4">
                    <label for="cnf_user_password" class="form-label"> Confirm Password</label>
                    <input type="password" id="cnf_user_password" class="form-control" placeholder="Confirm Password" 
                    autocomplete="off" required="required" name="cnf_user_password">
                </div>
<!-- address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" 
                    autocomplete="off" required="required" name="user_address">
                </div>
<!-- contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Contact" 
                    autocomplete="off" required="required" name="user_contact">
                </div>

                <div class="mt-4 pt-2" >
                    <input type="submit" value="Register" class="bg-info px-1 b-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-2"  >Already have an account?<a href="user_login.php" class="text-danger"> Login </a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!-- php code -->

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $cnf_user_password=$_POST['cnf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];

// select query
$select_query="select * from `user_table` where username='$user_username' or user_email=' $user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('username and email already exist ');</script>";
}elseif( $user_password!=$cnf_user_password){
    echo "<script>alert('passwords do not matches ');</script>";
}else{
    // insert query
    $insert_query="insert into `user_table` (username,user_email,user_password,
    user_image,user_address,user_mobile) values ('$user_username' ,
    '$user_email', '$hash_password','$user_image',' $user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    if( $sql_execute){
        echo "<script>alert('Data inserted ');</script>";
    }else{
        die(mysqli_error($con));
    }
}
}

?>