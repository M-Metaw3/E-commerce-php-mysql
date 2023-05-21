<?php
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>index</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg  navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/newwwwwww.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav m-auto">
                 
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">اتصل بنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="projects.php">باقات التشطيب </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="jops.php">اعمالنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="services.php">الخدمات</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">الصفحه الرئيسيه</a>
                  </li>
                </ul>
                <?php if (isset($_SESSION['user_id'])): ?>
    <span>مرحبًا، <?php echo $_SESSION['user_name']; ?></span>
    <a href="logout.php"><button id="user" class="btn btn-secondary button">تسجيل الخروج</button></a>
<?php else: ?>
    <a href="Admin.php"><button id="user" class="btn btn-secondary button">تسجيل الدخول</button></a>
<?php endif; ?>
              </div>
            </div>
          </nav>
</header>

<!--Start Articles-->
<main>
  <div class="articles" id="articles">
    
    <div id="photo-the-top">
      <h1>خدمات</h1>
      </div>
      <div class="container">
  <?php
  
  
  
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'finishing';
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check for errors
  if (!$conn) {
      die('Could not connect: ' . mysqli_error());
  }
  
  $sql = 'SELECT * FROM categories';
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $details = $row['details'];
    $image = $row['image'];
  
  
 echo      '<div>';
  
echo '<a class="hover" href="services-1.php?category='.$name.'">';
 echo   '<div class="cube">';
 echo"<img src='uploads/$image' width='100'>";
 echo     '<div class="content">';
 echo        " <h2> $name</h2>";
 echo         " <p> $details </p>";
 echo    ' </div>';
 echo   "</div>";
 echo    '</a>';
 echo      '</div>';

  }
    mysqli_close($conn);
  
  
  ?>
          </div>
          </div>

</main>
<!--End Articles-->

        <footer>
          <div id="fotre">
            <div id="ahmed">Call us toll-free at <SPan class="asd">823838298329</SPan></div>
            <P>All contents © 2020 <a href="google.com" target="_self">rcc dignd </a> Egypt. All rights reserved.</P>
          </div>
        </footer>




    <script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</htmt>