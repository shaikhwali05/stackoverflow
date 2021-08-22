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
  
  <?php
  $id = $_GET['catid'];

  $sql = "SELECT * FROM `category_table` WHERE `category_id`= $id;";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $catname = $row['category_name'];
    $catdesc = $row['category_description'];
  }

  ?>

  <?php
  $showAlert = false;
  $method = $_SERVER['REQUEST_METHOD'];
  if ($method == 'POST') {
    // insert thread into db
    $showAlert = true;

    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_catid`, `thread_userid`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn , $sql);
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Question has been added.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }
  
  ?>


  <div class="container my-2">
    <div class="jumbotron">
      <h1 class="display-4">Welcome To <?php echo $catname; ?> Forums!</h1>
      <p class="lead"><?php echo $catdesc; ?></p>
      <hr class="my-4">
      <p>No Spam / Advertising / Self-promote in the forums.
        Do not post copyright-infringing material.
        Do not post “offensive” posts, links or images.
        Do not cross post questions.
        Do not PM users asking for help.</p>
      <p class="lead">
        <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
      </p>
    </div>


  </div>
  <div class="container">
    <h1 class="py-2">Start a Discussion</h1>
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
      <div class="form-group">
        <label for="title">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Ask your problem..">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short as possible.</small>
      </div>
      <div class="form-group">
        <label for="desc">Evaluate Your Problem</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
  <div class="container my-4">
    <h1>Browse Questions</h1>
    <?php
    $id = $_GET['catid'];

    $sql = "SELECT * FROM `threads` WHERE `thread_catid`= $id;
    ";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
      $noResult = false;
      $id = $row['thread_id'];
      $title = $row['thread_title'];
      $desc = $row['thread_desc'];
      $time = $row['timestamp'];
      $thread_userid = $row['thread_userid'];

      $sql2 = "SELECT user_email FROM `users` WHERE `sno`= $thread_userid";
      $result2 = mysqli_query($conn , $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      

      echo '<div class="media py-3">
     <img class="mr-3" src="partials/img/user.jpg" width="50px" height="50px" style="border-radius: 50%;" alt="Generic placeholder image">
     <div class="media-body ">
     <p class="font-weight-bold my-0">'.$row2['user_email'].' commented at '.$time.'</p>
       <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
       ' . $desc . '
     </div>
   </div>';
    }
    if ($noResult) {
      echo '<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <p class="display-4">No Questions Found</p>
        <p class="lead">Be the first person to ask.</p>
      </div>
    </div>';
    }


    ?>

  </div>





  <?php include 'partials/footer.php' ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>