<?php
include('./includes/connect.php');


//getting pro
function getProducts(){

    global $con;


    // condtion to check product is set or not

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){

    $select_query="select* from `products` order by rand() limit 0,9 ";
$result_query=mysqli_query($con,$select_query);
//  $row=mysqli_fetch_assoc($result_query);
//  echo $row['product_title'];
while( $row=mysqli_fetch_assoc($result_query)){
   $product_id=$row['product_id'];
   $product_title=$row['product_title'];
   $product_description=$row['product_description'];
   // $product_keywords=$row['product_keywords'];
   $product_image1=$row['product_image1'];
   $product_price=$row['product_price'];
   $categoroy_id=$row['categoroy_id'];
   $brand_id=$row['brand_id'];
   echo "      <div class='col-md-4 mb-2'>
       <div class='card'>
                 <img src='./admin_area/products_images/$product_image1' class='card-img-top' alt='$product_title'>
                 <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <p class='card-text'> $product_description</p>
                   <p class='card-text'> ₹$product_price</p>
                   <a href='./user_area/user_login.php' class='btn btn-info'>Buy Now</a>
                   <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
     </div>
    </div>
   </div>";
}
} 
} 
}

// getting all products
function getAllProduct(){

  global $con;


  // condtion to check product is set or not

  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){

  $select_query="select* from `products` order by rand() limit 0,9 ";
$result_query=mysqli_query($con,$select_query);
//  $row=mysqli_fetch_assoc($result_query);
//  echo $row['product_title'];
while( $row=mysqli_fetch_assoc($result_query)){
 $product_id=$row['product_id'];
 $product_title=$row['product_title'];
 $product_description=$row['product_description'];
 // $product_keywords=$row['product_keywords'];
 $product_image1=$row['product_image1'];
 $product_price=$row['product_price'];
 $categoroy_id=$row['categoroy_id'];
 $brand_id=$row['brand_id'];
 echo "      <div class='col-md-4 mb-2'>
     <div class='card'>
               <img src='./admin_area/products_images/$product_image1' class='card-img-top' alt='$product_title'>
               <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                 <p class='card-text'> $product_description</p>
                 <p class='card-text'> ₹$product_price</p>
                 <a href='./user_area/user_login.php' class='btn btn-info'>Buy Now</a>
                 <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
   </div>
  </div>
 </div>";
}
} 
} 
}



// getting unique cat
function getUniqueCategories() {
  global $con;

  // Condition to check if the category is set
  if (isset($_GET['category'])) {
    $categoroy_id = $_GET['category'];

    // Escaping special characters in category_id to prevent SQL injection
    $categoroy_id = mysqli_real_escape_string($con, $categoroy_id);

    // Selecting products based on the category_id
    $select_query = "SELECT * FROM `products` WHERE categoroy_id=$categoroy_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo"<h2 class='text-center text-danger' > NO STOCK FOR CATEGORY</h2>";
    }

    if ($result_query) {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $categoroy_id = $row['categoroy_id'];
        $brand_id = $row['brand_id'];
        echo "
          <div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/products_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'> ₹$product_price</p>
                <a href='./user_area/user_login.php' class='btn btn-info'>Buy Now</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
      }
    } else {
      echo "Error executing query: " . mysqli_error($con);
    }
  }
}

// getting unique brands
function getUniqueBrands() {
  global $con;

  // Condition to check if the brand is set
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];

    // Escaping special characters in brand_id to prevent SQL injection
    $brand_id = mysqli_real_escape_string($con, $brand_id);

    // Selecting products based on the brand_id
    $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);

    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'>THIS BRAND IS NOT AVAILABLE FOR SERVICE</h2>";
    }

    if ($result_query) {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $categoroy_id = $row['categoroy_id']; // Corrected the typo here
        $brand_id = $row['brand_id'];

        echo "
          <div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/products_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'> ₹$product_price</p>
               <a href='./user_area/user_login.php' class='btn btn-info'>Buy Now</a>
                 <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
      }
    } else {
      echo "Error executing query: " . mysqli_error($con);
    }
  } 
}



// displaying brands in sinv
function getBrands(){
    global $con;
    $select_brands="select * from `brands`";
    $result_brands=mysqli_query($con,$select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while( $row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo "   <li class='nav-item '>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
    </li>";
    }
}


// catagory
function getCatagories(){
    global $con;
    $select_categories="select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while( $row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo "   <li class='nav-item '>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";
    }
}


//seraching product

function searchProduct() {
  global $con;

  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];

    // Escaping special characters in search_data_value to prevent SQL injection
    $search_data_value = mysqli_real_escape_string($con, $search_data_value);

    // Selecting products based on the search_data_value
    $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);

    if ($result_query) {
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $categoroy_id = $row['categoroy_id']; // Corrected the typo here
        $brand_id = $row['brand_id'];

        echo "
          <div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/products_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'> ₹$product_price</p>
                <a href='./user_area/user_login.php' class='btn btn-info'>Buy Now</a>
                 <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
      }
    } else {
      echo "Error executing query: " . mysqli_error($con);
    }
  } 
}


// view details function
function view_details() {
  global $con;

  // Condition to check if product_id is set
  if (isset($_GET['product_id'])) { // Error: The variable should not be quoted
      if (!isset($_GET['category'])) {
          if (!isset($_GET['brand'])) {
              $product_id = intval($_GET['product_id']); // Use intval to sanitize input

              // Query to select product details
              $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
              $result_query = mysqli_query($con, $select_query);

              // Fetch and display product details
              while ($row = mysqli_fetch_assoc($result_query)) {
                  $product_id = $row['product_id'];
                  $product_title = $row['product_title'];
                  $product_description = $row['product_description'];
                  $product_image1 = $row['product_image1'];
                  $product_image2 = $row['product_image2'];
                  $product_image3 = $row['product_image3'];
                  $product_price = $row['product_price'];
                  $categoroy_id = $row['categoroy_id'];
                  $brand_id = $row['brand_id'];

                  echo "
                  <div class='col-md-4 mb-2'>
                      <div class='card'>
                          <img src='./admin_area/products_images/$product_image1' class='card-img-top' alt='$product_title'>
                          <div class='card-body'>
                              <h5 class='card-title'>$product_title</h5>
                              <p class='card-text'>$product_description</p>
                              <p class='card-text'> ₹$product_price</p>
                              <a href='./user_area/user_login.php' class='btn btn-info'>Buy Now</a>
                              <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                          </div>
                      </div>
                  </div>
                  <div class='col-md-8'>
                      <div class='row'>
                          <div class='col-md-12'>
                              <h4 class='text-center text-info mb-5'>Related Products</h4>
                          </div>
                          <div class='col-md-6'>
                              <img src='./admin_area/products_images/$product_image2' class='card-img-top' alt='$product_title'>
                          </div>
                          <div class='col-md-6'>
                              <img src='./admin_area/products_images/$product_image3' class='card-img-top' alt='$product_title'>
                          </div>
                      </div>
                  </div>";
              }
          }
      }
  }
}


?>