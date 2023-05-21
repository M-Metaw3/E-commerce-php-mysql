<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'Ecommerc@gmail.com') {
    header("Location: index.php"); // Redirect to login page
    exit();
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Management</title>
	<!-- Add Bootstrap CSS to the head section of your HTML file -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
	
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
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Orders</h2>
		<form action="" method="post">
			<button type="submit" name="delete_all" class="btn btn-danger">Delete All Orders</button>
		</form>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>phone</th>
					<th>Product</th>
					<th>image</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total cost</th>
					<th>Adress</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Connect to the database
				$host = 'localhost';
				$user = 'root';
				$password = '';
				$database = 'finishing';
				$connection = mysqli_connect($host, $user, $password, $database);

				// Check if the connection was successful
				if (mysqli_connect_errno()) {
					die("Failed to connect to MySQL: " . mysqli_connect_error());
				}

				// Handle delete all orders button
				if (isset($_POST['delete_all'])) {
					$query = "DELETE FROM orders";
					mysqli_query($connection, $query);
                    header("Location: test2.php");

				}

				// Execute the query to retrieve the data
				$query = "SELECT o.id, o.quantity,u.address as address,u.phone as phone ,u.name as user_name, p.name as product_name, p.price,p.image as image
				          FROM orders o
				          JOIN users u ON o.user_id = u.id
				          JOIN products p ON o.product_id = p.id";
				$result = mysqli_query($connection, $query);

                $quer = "SELECT COUNT(*) as num_orders FROM orders";
                $resul = mysqli_query($connection, $quer);
                $ro = mysqli_fetch_assoc($resul);
                $num_orders = $ro['num_orders'];
                echo "<h1>Number of orders: $num_orders</h1>";
				// Display each row of data in a table row
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					$quantity = $row['quantity'];
					$user_name = $row['user_name'];
					$product_name = $row['product_name'];
					$price = $row['price'];
					$image = $row['image'];
					$address = $row['address'];
					$phone = $row['phone'];
					$total_cost = $quantity * $price;
					

					echo "<tr>";
					echo "<td>$id</td>";
					echo "<td>$user_name</td>";
					echo "<td>$phone</td>";
					echo "<td>$product_name</td>";
					echo '<td> <img width=100 src="' . $image . '" alt="popular laptops and computers"/> </td>';
					echo "<td>$quantity</td>";
					echo "<td>$price</td>";
					echo "<td>$total_cost</td>";
					echo "<td>$address</td>";
					echo "<td>";
					echo "<form action='' method='post'>";
					echo "<button type='submit' name='delete_order' value='$id' class='btn btn-danger'>Delete</button>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}

				// Handle delete single order button
				if (isset($_POST['delete_order'])) {
					$order_id = $_POST['delete_order'];
					$query = "DELETE FROM orders WHERE id='$order_id'";
					mysqli_query($connection, $query);
                    echo '<script>window.location.replace("http://localhost/100/Orders.php")</script>';
				}

				// Close the database connection
				mysqli_close($connection);
				?>
			</tbody>
		</table>
	</div>
</body>
</html>




