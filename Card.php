<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>index</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.min.css">
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
                    <a class="nav-link " href="contact-us.php">اتصل بنا</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="projects.php">باقات التشطيب</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="jops.php">اعمالنا</a>
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
                  <h1>  طريقه الدفع </h1>
                 </div>
                </div>
        </header>
        <main>
            
    <!-- ======= Contact Section ======= -->
    <section class="contact">
        <div class="container">  
          <div class="row">

            <div class="col-lg-5">
              <div class="info">
                <div class="email">
                  <i class="fas fa-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
                <div class="phone">
                  <i class="fas fa-phone-square-alt"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>  
              </div>
            </div>


            <div class="col-lg-7 mt-5 mt-lg-0">
              <form class="email-form">
                <div class="row">

                  <div class="form-group ">
                    <label>Your Name</label>
                    <input type="text" name="name" class="form-control" >
                  </div>

                  <div class="form-group ">
                    <label> Card Number </label>
                    <input type="email" name="email" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label> Expiration (mm/yy) </label>
                  <input type="text" name="subject"  class="form-control">
                </div>

                <div class="form-group">
                    <label> Security Code  </label>
                    <input type="password" name="Security-Code"  class="form-control">
                  </div>

                <div class="text-center"> <button type="submit">Send</button></div>
              
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
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