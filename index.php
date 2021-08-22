<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    
</head>

<body>
<?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/header.php' ?>
    
    
      
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="partials/img/slider3.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="partials/img/slider2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="partials/img/slider1.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


    <div class="container">
        <h1 class="text-center mb-2 mt-2">Discuss - Categories</h1>
        <div class="row">
            <!-- fetch all categories -->
            <?php 
            $sql = "SELECT * FROM `category_table`";
            $result = mysqli_query($conn  , $sql);
            while($row=mysqli_fetch_assoc($result)){
                $id = $row['category_id'];
                $categoryname = $row['category_name'];
                $categorydesc = $row['category_description'];
                echo '<div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="https://source.unsplash.com/300x250/?' . $categoryname . ' ,programming" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title"> <a href="threadlist.php?catid='.$id.'">'.$categoryname.'</a></h5>
                  <p class="card-text">'.substr($categorydesc , 0 ,70).'....</p>
                  <a href="threadlist.php?catid='.$id.'" class="btn btn-success">View Threads</a>
              </div>
          </div>
      </div>';
            }
            ?>
        
    </div>
    </div>
    




    <?php include 'partials/footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>