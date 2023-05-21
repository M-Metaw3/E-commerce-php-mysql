<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'Ecommerc@gmail.com') {
    header("Location: index.php"); // Redirect to login page
    exit();
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Add Bootstrap CSS to the head section of your HTML file -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			padding-top: 70px;
		}
	</style>
</head>
<body>
	<!-- Add navbar to the top of your HTML body -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
                <li class="nav-item ">
					<a class="nav-link" href="product.php">Add product</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Orders.php">Orders</a>
				 </li>
				<li class="nav-item">
					<a class="nav-link" href="contactdashboard.php">Contact Messages</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="category.php">Categories</a>
				</li>
			</ul>
		</div>
        <?php if (isset($_SESSION['user_id'])): ?>
<span style='color:white'>مرحبًا، <?php echo $_SESSION['user_name']; ?></span>
<a href="logout.php"><button id="user" class="btn btn-secondary button">تسجيل الخروج</button></a>

<?php endif; ?>
	</nav>

	<div class="container">
		<!-- Your existing code here -->
	</div>

	<!-- Add Bootstrap JS and jQuery to the end of your HTML body -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php

// Connect to database (replace with your own database credentials)
$host = 'localhost';
$dbname = 'finishing';
$username = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Initialize variables
$product = null;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create a new product
    // if (isset($_POST['create_product'])) {
    //     $name = $_POST['name'];
    //     $price = $_POST['price'];
    //     $details = $_POST['details'];
    //     $rate = $_POST['rate'];
    //     $category = $_POST['category'];
    //     // Upload image file
    //     $target_dir = 'uploads/';
    //     $target_file = $target_dir . basename($_FILES['image']['name']);
    //     move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    //     // Insert product into database
    //     $stmt = $pdo->prepare('INSERT INTO products (name, price, details, rate,category, image) VALUES (?, ?, ?, ?, ?)');
    //     $stmt->execute([$name, $price, $details, $rate,$category, $target_file]);
    //     echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
       
     
    //     exit();
    // }
// Create a new product
if (isset($_POST['create_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $rate = $_POST['rate'];
    $category = $_POST['category'];

    // Upload image file
    $image_name = uniqid() . '_' . $_FILES['image']['name'];
    $target_dir = 'uploads/';
    $target_file = $target_dir . $image_name;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo '<div class="alert alert-danger">Sorry, file already exists.</div>';
        exit;
    }

    // Upload the image
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Insert product into database
        $stmt = $pdo->prepare('INSERT INTO products (name, price, details, rate, category, image) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$name, $price, $details, $rate, $category, $target_file]);

        // Update the value of categories
        
$stmt = $pdo->prepare('SELECT COUNT(*) as num_categories FROM categories');
$stmt->execute();
$num_categories = $stmt->fetch()['num_categories'];
$stmt = $pdo->prepare('UPDATE entities SET value = ? WHERE name = ?');
$stmt->execute([$num_categories, 'categories']);
        echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
        exit();
    } else {
        echo '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
    }
}

// Update an existing product
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $rate = $_POST['rate'];
    $category = $_POST['category'];

    // Check if image file was provided
    $image = '';
    if ($_FILES['image']['size'] > 0) {
        // Delete existing image file if it exists
        $stmt = $pdo->prepare('SELECT image FROM products WHERE id=?');
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product['image']) {
            unlink($product['image']);
        }

        // Upload new image file
        $target_dir = 'uploads/';
        $target_file = $target_dir . uniqid() . '_' . basename($_FILES['image']['name']);

        //// Check if file already exists
        if (file_exists($target_file)) {
            echo '<div class="alert alert-danger">Sorry, file already exists.</div>';
            exit;
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = ", image='$target_file'";
    }

    // Update product in database
    $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, details=?, category=?, rate=?$image WHERE id=?");
    $stmt->execute([$name, $price, $details, $category, $rate, $id]);
    echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
    exit();
}

// Delete an existing product

if (isset($_POST['delete_product'])) {
    $id = $_POST['id'];

    // Delete the orders related to the product
    $stmt = $pdo->prepare('DELETE FROM orders WHERE product_id = ?');
    $stmt->execute([$id]);

    // Get the product details from the database
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    // Delete the product from the database
    $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
    $stmt->execute([$id]);
    // Delete the product image file if it exists
    $image_file = '' . $product['image'];
    echo $image_file ;
    if (file_exists($image_file)) {
        unlink($image_file);
    }

    echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
    exit();
}
    // Fetch product to edit
    if (isset($_POST['edit_product_submit'])) {
      $id = $_POST['id'];
       

        $stmt = $pdo->prepare('SELECT * FROM products WHERE id=?');
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Fetch all products from database
$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get list of categories
$stmt = $pdo->query('SELECT * FROM categories');
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML form for creating/updating products -->
<!-- Add Bootstrap CSS to the head section of your HTML file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Add Bootstrap JS and jQuery to the end of your HTML body -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- HTML form for creating/updating products -->
<?php

$db = mysqli_connect('localhost', 'root', '', 'finishing');
$quer = "SELECT COUNT(*) as num_orders FROM products";
$resul = mysqli_query($db, $quer);
$ro = mysqli_fetch_assoc($resul);
$num_orders = $ro['num_orders'];
echo "<h1>Number of products : $num_orders</h1>";?>

<form method="post" enctype="multipart/form-data" class="mx-auto mt-5 w-50">
    <input type="hidden" name="id" value="<?= $product['id'] ?? '' ?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" id="name" value="<?= $product['name'] ?? '' ?>">
    </div>
    <label for="category">Category:</label>
    <select name="category" class="form-control" id="category" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
        <?php endforeach ?>
    </select>
</div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control" id="price" value="<?= $product['price'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="details">Details:</label>
        <textarea name="details" class="form-control" id="details"><?= $product['details'] ?? '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="rate">Rate:</label>
        <input type="number" name="rate" class="form-control" id="rate" value="<?= $product['rate'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <?php if (isset($product['image'])): ?>
            <img src="<?= $product['image'] ?>" width="100"><br>
        <?php endif ?>
        <input type="file" name="image" class="form-control-file" id="image">
    </div>
    <?php if (isset($product)): // Show "Update" button if editing an existing product ?>
        <button type="submit" name="update_product" class="btn btn-primary">Update</button>
    <?php else: // Show "Create" button if creating a new product ?>
        <button type="submit" name="create_product" class="btn btn-primary">Create</button>
    <?php endif ?>
</form>

<!-- Table to display existing products -->
<div class="mx-auto mt-5 w-75">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Details</th>
                <th>Rate</th>
                <th>Image</th>
                <th>category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['details'] ?></td>
                    <td><?= $product['rate'] ?></td>
                    <td><img src="<?= $product['image'] ?>" width="100"></td>
                    <td><?= $product['category'] ?></td>

                    <td>
                        <form method="post" class="d-inline-block">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" name="delete_product" class="btn btn-danger">Delete</button>
                        </form>
                        <form method="post" class="d-inline-block">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="edit_product_submit" value="1">
                            <button type="submit" name="edit_product" class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>