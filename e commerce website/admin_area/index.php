<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
.admin_image{
    width: 100px;
    object-fit:contain
}

.footer{
    position: absolute;
    bottom: 0;
}

</style>


</head>
<body>
   <!-- navbar -->
    <div class="container-fluid p-0 bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="conatiner-fluid">
            <img src="../image/logo.jpg" alt="" class="logo">
                  <nav class="navbar navbar-expand-lg ">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link"  >Welcome Ashwin</a>
                    </li>
                </ul>
            
                </nav> 
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p2">Manage Details</h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div claSS="p-3">
                    <a href="#" > <img src="../image/img1.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="btn btn-outline-light"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button class="btn btn-outline-light"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categries</a></button>
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1">View categries</a></button>
                    <button class="btn btn-outline-light"><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>  
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>  
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>  
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>  
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1"> List Users</a></button>
                    <button class="btn btn-outline-light"><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>        
                </div>
            </div>
        </div>

        <!-- fourth child -->
         <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categries.php');
            }
            
            ?>

<?php
            if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
            }
            
            ?>
         </div>

<?php include("../includes/footer.php");?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>