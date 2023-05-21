<?php

// Connect to database
$dsn = 'mysql:host=localhost;dbname=finishing';
$username = 'root';
$password = '';
$options = [];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

// Check if entities table exists
$stmt = $pdo->query("SHOW TABLES LIKE 'entities'");
if ($stmt->rowCount() == 0) {
    // Create entities table if it does not exist
    $pdo->exec('CREATE TABLE entities (name VARCHAR(255) PRIMARY KEY, value INT NOT NULL)');
    $pdo->exec("INSERT INTO entities (name, value) VALUES ('categories', 0)");
}

// Handle form submissions
if (isset($_POST['create_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $rate = $_POST['rate'];
    $category = $_POST['category'];

    // Upload image file
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert product into database
    $stmt = $pdo->prepare('INSERT INTO products (name, price, details, rate, category, image) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $price, $details, $rate, $category, $target_file]);
    
    // Update the value of categories
    $stmt = $pdo->query('SELECT COUNT(*) as num_categories FROM categories');
    $num_categories = $stmt->fetch()['num_categories'];
    $stmt = $pdo->prepare('UPDATE entities SET value=? WHERE name=?');
    $stmt->execute([$num_categories, 'categories']);

    echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
    exit();
} elseif (isset($_POST['update_product'])) {
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
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $image = ", image='$target_file'";
    }

    // Update product in database
    $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, details=?, rate=?, category=?$image WHERE id=?");
    $stmt->execute([$name, $price, $details, $rate, $category, $id]);
    
    // Update the value of categories
    $stmt = $pdo->query('SELECT COUNT(*) as num_categories FROM categories');
    $num_categories = $stmt->fetch()['num_categories'];
    $stmt = $pdo->prepare('UPDATE entities SET value=? WHERE name=?');
    $stmt->execute([$num_categories, 'categories']);

    echo '<script>window.location.replace("http://localhost/100/product.php")</script>';
    exit();
}

// Get list of products
$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get list of categories
$stmt = $pdo->query('SELECT * FROM categories');
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Shop</title>
</head>
<body>
    <h1>My Shop</h1>
    
    <h2>Create Product</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="form-group">
            <label for="details">Details:</label>
            <textarea name="details" class="form-control" id="details" required></textarea>
        </div>
        <div class="form-group">
            <label for="rate">Rate:</label>
            <input type="number" name="rate" class="form-control" id="rate" required>
        </div>
        <div class="form-group">
    <label for="category">Category:</label>
    <select name="category" class="form-control" id="category" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
        <?php endforeach ?>
    </select>
</div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" id="image" required>
        </div>
        <button type="submit" name="create_product">Create Product</button>
    </form>
    
    <h2>Update Product</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="id" class="form-control" id="product_id" required>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="form-group">
            <label for="details">Details:</label>
            <textarea name="details" class="form-control" id="details" required></textarea>
        </div>
        <div class="form-group">
            <label for="rate">Rate:</label>
            <input type="number" name="rate" class="form-control" id="rate" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" class="form-control" id="category" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <button type="submit" name="update_product">Update Product</button>
    </form>
    
    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Details</th>
                <th>Rate</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['details'] ?></td>
                    <td><?= $product['rate'] ?></td>
                    <td><?= $product['category'] ?></td>
                    <td><img src="<?= $product['image'] ?>" height="100"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    <h2>Categories</h2>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><?= $category['name'] ?>: <?= $category['id'] ?></li>
        <?php endforeach ?>
    </ul>
    
</body>
</html>