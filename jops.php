

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
                    <a class="nav-link active" href="jops.php">اعمالنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="services.php">الخدمات</a>
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

        <div id="jops">
                <div id="photo-the-top">
                  <h1>المشاريع</h1>
                </div>
                <div id="text-the-top">
                  <h1>أفضل اعمالنا في التصميم الداخلي والخارجي في المدينة</h1>
                  <h1> !تعال و زرنا اليوم </h1>
                  </div>
                <div class="container">
                <div class="jops-columns">
                    <div class="row">

                        <div  class="potp  col-xl-3 col-lg-3 col-md-3  col-sm-12">
                          <a href="jops-1.php"><img src="img/jops-1-1.webp" alt="">
                            <h3>تصميم مجلس نساء كلاسيك </h3></a>
                        </div>

                        <div  class="potp offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 offset-md-1 col-md-3  col-sm-12">
                          <a href="jops-2.php"><img src="img/jops-erd-1.jpg" alt="">
                          <h3>تصميم داخلي شقة نيو كلاسيك</h3></a>                     
                         </div>

                        <div  class="potp offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 offset-md-1 col-md-3  col-sm-12">
                          <a href="jops-3.php"><img src="img/jops-3.jpg" alt="">
                            <h3>مشروع تصميم وتشطيب شقة </h3></a>                      
                        </div>
                    </div>


                    <div class="row">

                      <div  class="potp  col-xl-3 col-lg-3 col-md-3  col-sm-12">
                        <a href="jops-4.php"><img src="img/jops-4.webp" alt="">
                          <h3>تشطيب شقة نيو كلاسيك </h3></a>                  
                      </div>

                      <div  class="potp offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 offset-md-1 col-md-3  col-sm-12">
                        <a href="jops-5.php"><img src="img/jops-5.webp" alt="">
                          <h3>تصميم وتشطيب شقة بالقاهرة</h3></a>                      
                      </div>

                      <div  class="potp offset-xl-1 col-xl-3 offset-lg-1 col-lg-3 offset-md-1 col-md-3  col-sm-12">
                        <a href="jops-6.php"><img src="img/jops-6.webp" alt="">
                          <h3>تصميم فيلا كلاسيك بالسعودية</h3></a>                      
                      </div>
                  </div>

                </div>
            </div>
        </div>

        </header>
        <footer>
          <div id="fotre">
            <div id="ahmed">Call us toll-free at <SPan class="asd">823838298329</SPan></div>
            <P>All contents © 2020 <a href="google.com" target="_self">rcc dignd </a> Egypt. All rights reserved.</P>
          </div>
        </footer>


    <script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>