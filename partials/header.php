<?php







echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">Navbar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      $sql = "SELECT category_name , category_id FROM `category_table`";
      $result = mysqli_query($conn , $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';

      }

      
      
        
        
        
        
      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="contact.php">Contact</a>
    </li>
  </ul>
  <div class="row mx-2">
  <form action = "search.php" method = "get" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">login</button>
  <button type="button" class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>
  </div>
</div>;
</nav>';


include "partials/loginModal.php";

include 'partials/signupModal.php';





?>