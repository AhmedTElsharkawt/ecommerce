<?php include 'includes/header.php' ?>
<?php include 'includes/nav.php' ?>
<?php include 'includes/conn.php' ?>
<?php include 'includes/functions.php' ?>

<?php

  $do = $_GET['do'] ?? 'home';

  // Home page
  if ($do == 'home') : ?>
    <div class="container">
      <h1 class="text-center my-5 text-success">All Products</h1>

      <div class="row">
        <?php 
        // Database query
        $products = $conn->query("SELECT * FROM `products`");

        foreach ($products as $product) { ?>
          <div class="col-md-3 my-2">
            <div class="card">
              <img height="200px" src="<?= $product['image'] ?>" class="card-img-top" alt="...">

              <div class="card-body">
                <h5 class="card-title"> Title: <?= $product['title'] ?></h5>
                <p class="card-text">description: <?= $product['description'] ?> </p>
                <p class="card-text">price: <?= $product['price'] ?> </p>
                <p class="card-text">Date of add: <?= $product['date'] ?> </p>
                <small>Category: <?= $product['category_id'] ?> </small>
              </div>
            </div>
          </div>
        <?php
        } ?>
      </div>
    </div>
  <?php 

  // Add products page
  elseif ($do == 'add') : ?>
    <div class="container">
      <h1 class="text-center my-5">All Products</h1>

      <form class="w-75 mx-auto my-5" action="?do=insert" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input name="title" type="text" class="form-control" placeholder="Enter title" >
        </div>

        <div class="mb-3">
          <label class="form-label">description</label>
          <input name="description" type="text" class="form-control" placeholder="Enter description" >
        </div>

        <div class="mb-3">
          <label class="form-label">price</label>
          <input step=".1" name="price" type="number" class="form-control" placeholder="Enter price" >
        </div>
      
        <div class="mb-3">
          <label class="form-label">image</label>
          <input name="image" type="file" class="form-control"  >
        </div>
      
        <div class="mb-3">
          <label class="form-label">categoryid</label>
          <select name="cat_id" class="form-control">
            <option value="1">Clothes</option>
            <option value="2">Mobiles</option>
          </select>
        </div>
      
        <button type="submit" class="btn btn-success w-100 mt-2"> + ADD PRODUCT</button>
      </form>
    </div>
  <?php

  // Insert page
  elseif ($do == 'insert') :

    // Get data from form
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $image = uploadImage($_FILES['image']);
      $cat_id = $_POST['cat_id'];
      
    // DB query
    $ins_q = $conn->query("INSERT INTO `products`(
                            `title`,
                            `description`,
                            `price`,
                            `image`,
                            `category_id`,
                            `date`
                          )
                          VALUES(
                            '$title',
                            '$description',
                            '$price',
                            '$image',
                            '$cat_id',
                            Now()
                          )");
    if ($ins_q) {
      header('Location: index.php');
    }
  endif; 


  ?>
  
<?php include 'includes/footer.php' ?>