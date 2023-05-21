
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

$db = mysqli_connect('localhost', 'root', '', 'finishing');
mysqli_set_charset($db, 'utf8');

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
  // Delete the selected contact(s)

  foreach ($_POST['contacts'] as $contactId) {
    $query = "DELETE FROM Connect_us WHERE id = $contactId";
    mysqli_query($db, $query);
  }
  echo '<script>window.location.replace("http://localhost/100/contactdashboard.php")</script>';

}

// Check if the delete all button is clicked
if (isset($_POST['delete-all'])) {
  // Delete all contacts
  $query = "DELETE FROM Connect_us";
  mysqli_query($db, $query);
  echo '<script>window.location.replace("http://localhost/100/contactdashboard.php")</script>';

}

// Fetch all contacts
$query = "SELECT * FROM Connect_us";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact List</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container my-4">
    <h1>Contact List</h1>
<?php


$quer = "SELECT COUNT(*) as num_orders FROM Connect_us";
$resul = mysqli_query($db, $quer);
$ro = mysqli_fetch_assoc($resul);
$num_orders = $ro['num_orders'];
echo "<h1>Number of Messages : $num_orders</h1>";?>
    <form method="post">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>&nbsp;</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Subject</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
  <?php while ($contact = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><input type="checkbox" name="contacts[]" value="<?php echo $contact['ID']; ?>"></td>
      <td><?php echo $contact['name']; ?></td>
    

      <td><?php echo $contact['email']; ?></td>
      <td><?php echo $contact['phone']; ?></td>
      <td><?php echo $contact['subject']; ?></td>
      <td><?php echo $contact['message']; ?></td>
    </tr>
    <?php endwhile; ?>
</tbody>
</table>
</div>

<div class="my-4">
          <button type="submit" class="btn btn-danger" name="delete">Delete Selected</button>
        <button type="submit" class="btn btn-danger" name="delete-all" onclick="return confirm('Are you sure you want to delete all contacts?')">Delete All</button>
      </div>
    </form>
  </div>

</body>
</html>