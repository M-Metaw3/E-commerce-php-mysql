<?php
session_start();
// Connect to database (replace with your own database credentials)

$host = 'localhost';
$dbname = 'finishing';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);


// Fetch all products
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $stmt = $pdo->prepare('SELECT * FROM products WHERE category = ?');
    $stmt->execute([$category]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->query('SELECT * FROM products');
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Handle checkout request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!$_SESSION){
        echo '<script>window.location.replace("http://localhost/100/Admin.php")</script>';
         exit;
      }
    // Get the shopping cart data from local storage
    $shoppingCart = isset($_POST['shoppingCart']) ? json_decode($_POST['shoppingCart'], true) : [];

    // Get the user ID from the session
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Insert the shopping cart data into the database
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)");
    foreach ($shoppingCart as $product) {
        $stmt->execute([$userId, $product['id'], $product['count']]);
    }

    // Clear the shopping cart data from local storage
    unset($_POST['shoppingCart']);

    // Redirect to the confirmation page
    echo '<script>alert("تم الشراء بنجاح سيتم التواصل معك والشحن الى عنوانك المسجل")</script>';
    echo '<script>localStorage.removeItem("shoppingCart");</script>';
    echo '<script>window.location.replace("http://localhost/100/services-1.php")</script>';



    exit;
}
?>


<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous"
        />
        <link href="Css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="Css/all.min.css" rel="stylesheet" type="text/css">
        <link href="Css/style.css" rel="stylesheet" type="text/css">
        <link type="text/css" href="js-andCss-shop/main.css" rel="stylesheet" />
        <title>shop </title>
    </head>

    <body>
 
        <!--Navbar-->
    
        <nav class="navbar navbar-expand-lg  navbar-light bg-light">
            <div class="container-fluid">
                  <a class="navbar-brand" href="#">project</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav m-auto">
                    
                      <li class="nav-item">
                        <a class="nav-link" href="contact-us.php">اتصل بنا</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="projects.php"> باقات تشطيب</a>
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
                      
                    <li class="nav-item">
                        <div class="nav-link" href="#">
                            <div class="navbar-top">
                                <button id="menuButton"><i class="fas fa-bars"></i></button>
                                <!--Shopping cart-->
                            <div class="shopping-cart">
                                <div class="sum-prices">
                                    <i class="fas fa-shopping-cart shoppingCartButton"></i>
                                    <!--The total prices of products in the shopping cart -->
                                    <h6 id="sum-prices"></h6>
                                </div>
                            </div>
                        </div>
          
                        <div class="producstOnCart hide">
                            <div class="overlay"></div>
                            <div class="top">
                                <button id="closeButton">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                                <h3>Cart</h3>
                            </div>
                            <ul id="buyItems"> <h4 class="empty">Your shopping cart is empty</h4> </ul>
                            <form id="checkoutForm" method="post">
                                <input type="hidden" id="shoppingCartInput" name="shoppingCart">
                                <button type="submit" class="btn checkout hidden">Check out</button>
                            </form>
                        </div>

                    </div>
                      </li>
                    </ul>
                </div>
            </div>
            
        </nav>
        <?php if (isset($_SESSION['user_id'])): ?>
<span>مرحبًا، <?php echo $_SESSION['user_name']; ?></span>
<a href="logout.php"><button id="user" class="btn btn-secondary button">تسجيل الخروج</button></a>
<?php else: ?>
<a href="Admin.php"><button id="user" class="btn btn-secondary button">تسجيل الدخول</button></a>
<?php endif; ?>
<main>
    <div class="container text-top">
    </div>
    <section class="main-section">
        <div class="product-container">
            <!-- <h3>popular laptops</h3> -->
            
            <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <div class="product-under">
                        <figure class="product-image">
                            <img src="<?= $product['image'] ?>"  alt="popular labtops and computers"/>
                            <div class="product-over">
                                <button 
                                    class="btn btn-small addToCart"
                                    data-product-id="<?= $product['id'] ?>"
                                >
                                    <i class="fas fa-cart-plus"></i>Add
                                    to cart
                                </button>
                            </div>
                        </figure>
                        <div class="product-summary">
                            <h4 class="productName"><?= $product['name'] ?></h4>
                            <span class="stars"></span>
                            <h6 class="price">ج.م
                                <span class="priceValue" >  <?= $product['price'] ?></span>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </section>
</main>
        <script src="Js/jquery-3.6.0.js"></script>
        <script src="Js/bootstrap.min.js"></script>
        <script src="js-andCss-shop/script-shop.js"></script>
        <script src="js-andCss-shop/shopping-cart.js"></script>
        <script>
            $(function() {
                // Handle checkout form submission
                $('#checkoutForm').on('submit', function(event) {
                    // Get the shopping cart data from local storage
                    var shoppingCart = localStorage.getItem('shoppingCart');

                    // Set the shopping cart data in the hidden input field
                    $('#shoppingCartInput').val(shoppingCart);

                    // Submit the form
                    return true;
                });
            });
        </script>
    </body>
</html>