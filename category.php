
<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'Ecommerc@gmail.com') {
    header("Location: index.php"); // Redirect to login page
    exit();
}?>

<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
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
    <h1>Categories</h1>

    <?php

// Connect to the database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'finishing';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check for errors
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Handle create/update/delete actions
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Create a new category
        if ($action == 'create') {
            $name = $_POST['name'];
            $details = $_POST['details'];
            $image_name = uniqid() . '_' . $_FILES['image']['name'];
            $target_dir = 'uploads/';
            $target_file = $target_dir . $image_name;
        
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO categories (name, details, image) VALUES ('$name', '$details', '$image_name')";
                mysqli_query($conn, $sql);
            } else {
                echo '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div>';
            }
        }

        // Update an existing category
        elseif ($action == 'update') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $details = $_POST['details'];

            $sql = "UPDATE categories SET name='$name', details='$details' WHERE id=$id";
            mysqli_query($conn, $sql);
        }

        // Delete a category
      // Delete a category and its related products
      elseif ($action == 'delete') {
        $id = $_POST['id'];

        // Get the name and filename of the category image
        $sql = "SELECT name, image FROM categories WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $image_file = 'uploads/' . $row['image'];
    
        // Delete the category image file if it exists
        if (file_exists($image_file)) {
            unlink($image_file);
        }
    
        // Delete the category from the database
        $sql = "DELETE FROM categories WHERE id=$id";
        mysqli_query($conn, $sql);
    
        // Delete the products related to the category
        $sql = "SELECT id, image FROM products WHERE category='$name'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $product_image = $row['image'];
            $image_file = '' . $product_image; // Construct the image file path
            if (file_exists($image_file)) {
                unlink($image_file);
            }
            $sql = "DELETE FROM products WHERE id=$product_id";
            mysqli_query($conn, $sql);
        }
}}
}
    // Display the list of categories
    $sql = 'SELECT * FROM categories';
    $result = mysqli_query($conn, $sql);

    echo '<table class="table">';
    echo '<tr><th>ID</th><th>Name</th><th>Details</th><th>Image</th><th>Action</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $details = $row['details'];
        $image = $row['image'];

        echo '<tr>';
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$details</td>";
        echo "<td><img src='uploads/$image' width='100'></td>";
        echo '<td>';
        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='update'>";
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='name' value='$name'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<input type='text' class='form-control' name='details' value='$details'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Update</button>";
        echo "</form>";

        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='action' value='delete'>";
        echo "<button type='submit' class='btn btn-danger'>Delete</button>";
        echo "</form>";
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // Display the form for adding a new category
    echo "<form method='post' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='action' value='create'>";
    echo "<div class='form-group'>";
    echo "<input type='text' class='form-control' name='name' placeholder='Name'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<input type='text' class='form-control' name='details' placeholder='Details'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<input type='file' name='image'>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-success'>Create</button>";
    echo "</form>";

    // Close the database connection
    mysqli_close($conn);

    ?>

</div>

</body>
</html>