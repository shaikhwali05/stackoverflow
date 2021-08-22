
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
    $id = $_GET['threadid'];
    
    $sql = "SELECT * FROM `threads` WHERE `thread_id`= $id;";
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)){
      $title = $row['thread_title'];
      $desc = $row['thread_desc'];
      
    }

    ?>
    <!-- Inserting comments -->
    <?php
  $showAlert = false;
  // $method = $_SERVER['REQUEST_METHOD'];
  if (isset($_POST['submit'])) {
    // insert thread into db
    $showAlert = true;

    $comment = $_POST['comment'];
    
    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_from`, `comment_time`) VALUES ('$comment', '$id', '0', current_timestamp())
    ";
    $result = mysqli_query($conn , $sql);
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Comment has been added.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }
  
  ?>
  <!-- ending comment. -->


    <div class="container my-2">
    <div class="jumbotron">
  <h1 class="display-4"> <?php echo $title; ?> </h1>
  <p class="lead"><?php echo $desc; ?></p>
  <hr class="my-4">
  <p>No Spam / Advertising / Self-promote in the forums.
                        Do not post copyright-infringing material.
                        Do not post “offensive” posts, links or images.
                        Do not cross post questions.
                        Do not PM users asking for help.</p>
  <p class="lead">
    <p class="fnt-weight-bold">Posted by : Wali</p>
  </p>
</div>

<!-- comments section -->
<div class="container">
    <h1 class="py-2">Post a Comment</h1>
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
      
      <div class="form-group">
        <label for="desc">Type your Comment</label>
        <textarea class="form-control" placeholder="write here..." id="comment" name="comment" rows="3"></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
        

    </div>
    <div class="container my-4">
        <h1>Discussions</h1>
         <?php
    $id = $_GET['threadid'];
    
    $sql = "SELECT * FROM `comments` WHERE `thread_id`= $id;
    ";
    $result = mysqli_query($conn , $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
     $id = $row['comment_id'];
     $content = $row['comment_content'];
     $comment_time = $row['comment_time'];
     

     echo '<div class="media py-3">
     <img class="mr-3" src="partials/img/user.jpg" width="50px" height="50px" style="border-radius: 50%;" alt="Generic placeholder image">
     <div class="media-body ">
     <p class="font-weight-bold my-0">Wali commented at '.$comment_time.'</p>
       ' . $content. '
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