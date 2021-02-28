<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Notes - Make it Easy</title>
</head>

<body>
  <?php
//connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database= "crud";

$conn = mysqli_connect($servername,$username,$password,$database);

 
   $method = $_SERVER['REQUEST_METHOD'];
   if($method =='POST'){
    $Title = $_POST["Title"];
     $Description = $_POST["Description"];

     
  $sql = "INSERT INTO `user` (`Title`, `Description`, `Date`) VALUES ('$Title', '$Description', current_timestamp())";
  $Result = mysqli_query($conn, $sql);

   }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">iNotes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <?php
  if($Result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Note has been inserted successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <h1 class="text-center py-3">Make Your Notes Here</h1>

  <div class="container">
    <form action="index.php" method="post">
      <div class="mb-3">
        <label for="Title" class="form-label">Title</label>
        <input type="text" class="form-control" id="Title" name="Title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
      </div>
      <div class="form-group purple-border">
        <label for="Description">Description</label>
        <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary my-3 py-2">Add Note</button>
    </form>
  </div>

  <div class="container">
  

 <table class="table">
  <thead>
    <tr>
      <th scope="col">SrNo</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Task</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $sql = "SELECT * FROM `user`";
  $Result = mysqli_query($conn, $sql);
  $SrNo=0;
  while($row = mysqli_fetch_assoc($Result)){
    $SrNo+=1;
  $Title = $row['Title'];
  $desc = $row['Description'];
      echo '<tr>
        <th scope="row">'. $SrNo .'</th>
        <td>'.$Title.'</td>
        <td>'.$desc.'</td>
        <td><a class="btn btn-primary" href="index.php" role="button" id= "id">Delete</a></td>
      </tr>';
    }
      ?> 
    </tbody>
  </table>
  
  <?php
  if(id){
    $sql = "DELETE FROM `user` WHERE `user`.`note_id` = $id";
    $Result = mysqli_query($conn, $sql);
  }
      ?>
 
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>