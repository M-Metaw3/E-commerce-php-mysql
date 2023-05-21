<!-- https://decormasr.com/ -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>الصفحه الرئيسية</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  

</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finishing";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM images";
$result = $conn->query($sql);
?>


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
                      <a class="nav-link" href="services.php">الخدمات</a>
                    </li>
              
                    
<?php
if (isset($_SESSION['email']) && $_SESSION['email'] === 'Ecommerc@gmail.com') {
    echo '<li class="nav-item">
              <a class="nav-link " aria-current="page" href="product.php">لوحة التحكم</a>
          </li>';
}
?>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">الصفحة الرئيسية</a>
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

            <div class="poto-home">
              <img src="img/2-3.webp" alt="">
              <div class="row">
                <div class="text offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8">
              <h1>تشطيب الوحدات السكنية - شركة تشطيب في مصر بأفكار ابداعية مبتكرة</h1> <hr>
              </div>
              </div>
            </div>
    </header>
    <main>
      <div id="main-top">
        <div class="container">
          <div class="row">
            <p class="col-xl-3 col-lg-3 col-md-3 col-sm-6">البيت الذكي</p>
            <p class="col-xl-3 col-lg-3 col-md-3 col-sm-6">تشطيبات وديكورات</p>
            <p class="col-xl-3 col-lg-3 col-md-3 col-sm-6">التصميم الخارجي</p>
            <p class="col-xl-3 col-lg-3 col-md-3 col-sm-6">تصميم داخلي</p>
          </div>
        </div>
      </div>
      <div id="main-center">
        <div class="container">
          <div class="row margen-t">
              <img class="img col-xl-4 col-lg-6  col-sm-12" src="img/who-are-decormasr.webp" alt="">
              <div class="text offset-xl-2 col-xl-6 offset-lg-0 col-lg-6 offset-md-3 col-md-9 col-sm-12">
                <h1>معلومات عنا</h1>
                <hr>
                <p>اذا كنت تبحث عن شركة تشطيب في مصر لديها خبرة وسابقة اعمال علي مدار 5 سنبين في تصميم وتنفيذ جميع انماط الديكورات الحديثه والكلاسيسكيه فان ديكور مصر الخيار الافضل لديك لما لديها من خبرات واسعة تجعلها في صدارة شركات تشطيب شقق في مصر.اكتسبنا خبرة سنين طويلة في تصميم وتنفيذ الديكورات الحديثة</p>
              </div>
          </div>
    <hr id="hr1">
    <hr id="hr2">
          <div class="row margen-t">
            <div class="text  col-xl-6  col-lg-6  col-md-9 col-sm-12">
              <h1>تصميمات ابداعية مبتكرة</h1>
              <hr>
              <p>تتميز ديكور في تقديم حلول ابداعية مبتكرة للفلل والشقق واستغلال المساحات بشكل مذهل،عن طريق تصميمات داخليه وخارجيه ومخططات تنفيذية مدروسه بشكل احترافي وبجوده عاليه. تسطيع الشركة تصميم جميع انماط الديكور وتنفيذ التصميم بشكل احترافي وبأعلي الخامات الموجوده بالسوق.اكتسبنا ثقة كبيرة علي مدار 8 سنين من عملاءنا تجعلنا في صدارة شركات التشطيب في مصر.</p>
              <a href="jops.php"> اقرأ المزيد</a>
            </div>
            <img class=" col-xl-5 col-lg-6  col-sm-12 offset-md-3 offset-lg-0 offset-xl-1" src="img/img7-1.webp" alt="">
        </div> 

        <hr class="hr1">
        <hr class="hr2">

        <div class="row margen-t">
          <img class=" col-xl-5 col-lg-6  col-sm-12" src="img/img3-1.webp" alt="">
          <div class="text offset-xl-1 col-xl-6 offset-lg-0 col-lg-6 offset-md-3 col-md-9 col-sm-12">
            <h1>لماذا تشطيب الوحدات السكنية افضل شركة تشطيب في مصر؟</h1>
            <hr>
            <p>تعتبر شركة ديكور مصر من أفضل شركات تشطيب الشقق والفلل في مصر. توفر ديكور مصر خدمات تشطيب متكاملة بالنسبة للتشطيبات الداخلية والخارجية. توفر الشركة جميع الخدمات الهندسية المتكاملة بما فيها التصميمات المعمارية والهندسية الحديثة والمتطورة والعصرية توفير جميع أعمال .الديكورات والتشطيبات عالية الجودة للتشطيب الداخلي والخارجي للوحدة السكنية.</p>
          </div>
      </div>
        </div>
      </div>
    </main>
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


