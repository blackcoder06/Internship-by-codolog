<?php
include('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- font awsome link -->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
               <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" 
                    autocomplete="off" required="required" name="user_username">
                </div>

<!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" 
                    autocomplete="off" required="required" name="user_password">
                </div>



                <div class="mt-4 pt-2" >
                    <button class="bg-info"><a href="../payment.php" class="submit text-decoration-none text-light">Login</a></button>
                    <!-- <input type="submit" value="Login" class="bg-info px-1 b-0" name="user_login"> -->
                    <p class="small fw-bold mt-2 pt-2"  >Don't have an account?<a href="user_registration.php" class="text-danger"> Register </a></p>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
   

    $select_query="select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);


    // 
    if($row_count>0){
        if(password_verify($user_password, $row_data['user_password'])){
            echo "<script>alert('login successfully');</script>";
        }else{
            echo "<script>alert('invalid credentials');</script>";
        }
    }else{
            echo "<script>alert('invalid credentials');</script>";
    }
}

?>