<?php
include('includes/connect.php');
include('functions/common_function.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E commerce website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- font awsome link -->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .card-img-top {
    width: 100%;
    height: 200px;
    object-fit:contain;
}
</style>


    </head>
<body>
    <div class="container-fluid p-0 bg-light" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="./image/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="includes/contactinfo.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i> <sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price : 100</a>
        </li>
      </ul>
      <form class="d-flex"  action="self " method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
         <input type="submit" value="serach" class="btn btn-outline-light " name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- second child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class ="navbar-nav me-auto">
<li class="nav-item">
          <a class="nav-link" href="admin_area/index.php">Welcom guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_login.php">Login</a>
        </li>
</nav>

<!-- third child -->
 <div class="bg-light">
<h3 class="text-center"><b><i>Apni Dukaan</i></b></h3>
<p class="text-center"><i>Sab Kuch Apno Se Hi</i></p>
 </div>

 <!-- 4 child -->
  <div class="row bg-light px-1">
    <div class="col-md-10">
      <!-- products -->
       <div class="row ">
    
<!-- fetching products -->
 <?php

//  calling function
view_details();
getUniqueCategories();
getUniqueBrands();

 ?>

    <!-- row end -->
  </div>
  <!-- col end -->
</div>
  <div class="col-md-2 bg-secondary p-0">
      <!-- side nav -->
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>  Delivery Brands</h4></a>
        </li>
        <?php
       getBrands();
        ?>
     

       </ul>

       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        <?php
       getCatagories();
        ?>

       </ul>
    </div>
  </div>



<!-- include footer -->
<?php
include("./includes/footer.php");
?>
    </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>