<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">

	<title>MARKETPLACE</title>
	<link rel="stylesheet" href="online.css">
</head>

<body>

	<header class="header">
		<div class="container navbar">

			<a href="#home" class="logo">
				Lance <span> Cascayan </span>
			</a>

			
			<nav class="nav-menu">
				<a href="#home">HOME</a>
				<a href="#features">FEATURES</a>
				<a href="#about">ABOUT</a>
				<a href="#contact">CONTACT</a>
				<a href="#app.html" class="nav-button">Sign In</a>
			</nav>
		</div>		 	
	
	</header>
<?php
include 'db.php';

$sql = "SELECT * FROM product1";
$result = $conn->query($sql);
?>


	<div class="main-container">
<?php
if ($result && $result->num_rows > 0) {

	while ($product1 = $result->fetch_assoc()) {
?>
	

		<div class="container-product"> 
			<div class="images">
				<img src="image/<?php echo $product1['image']; ?>" alt="product">
			</div>

			<div class="Product-name"><?php echo htmlspecialchars($product1['product_name']); ?></div>	
		
			<div class="Product-price"> Price: <?php echo number_format($product1['price']); ?></div>	

			<div class="Product-stocks"> Stocks: <?php echo (int)$product1['stocks']; ?></div>

			<div class="button">
			<button type="button" class="First" 
				onclick="openBuyNow(
					<?php echo $product['product_id']; ?>,
					<?php echo addslashes($product['product_name']); ?>,
					<?php echo $product['price']; ?>,
					<?php echo $product['stocks']; ?>,
					<?php echo $product['image']; ?>
 			)" >Buy Now</button>

			<button class="Second"
				onclick="addToCart(
					<?php echo (int)$product['product-id']; ?>,
					<?php echo htmlspecialchars(json_encode($product['product_name']), ENT_QUOTES, 'UTF-8'); ?>
					<?php echo (float)$product['price']; ?>
					)">Add to Cart</button>
			</div>
		</div>
		

<?php
}
} else {
	echo "<p>No products available.</p>";
}
$conn->close();
?>



	</div>


<div class="model-overlay" id="buyNowModel">
	<div class="checkout-model">
		<div class="model-header">

		<h2>Product Checkout</h2>
	<button type="button" class="model-close"
		onclick="closeBuyNow()">
		&times;
</button>

</div>

<form id="checkoutform">
	<div class="checkout-product">
		<div class="checkout-image">
			<img id="checkoutImage src="" alt="product-Image">
		</div>
		
		<div class="checkout-details">
			<h3 id="checkoutName">Product Name</h3>

			<p>
				Price:
				<strong id="checkoutPrice">₱0.00</strong>
			</p>

			<p>
				Available Stocks:
				<strong id="checkoutStocks">0</strong>
			</p>
		</div>
	</div>
	
<hr>

<h3 class="form-heading">Customer Information</h3>

<div class="form-group">

	<label for="customerName">Full Name</label>

	<input type="text"
		id="customerName"
		name="customer_name"
		placeholder="Enter your full name" required>
</div>

<div class="form-group">

	<label for="customerAddress">Delivery Address</label>

	<textarea
		id="cutomerAddress"
		name="customer_Address"
		placeholder="Enter your complete delivery address" 
		rows="3"
		required></textarea>
</div>		 

<div class="form-group">

	<label for="customerContact">Contact Number</label>

		<input type="tel"
			id="customerContact"
			name="customer_contact"
			placeholder="Enter your contact number"
			required>
</div>			

<div class="form-group"> 
	<label for="orderQuantity">Quantity to Order</label>

	<input type="number"
		id="orderQuantity"
		name="quantity"
		value="1"
		min="1"
		step="1"
		required>

		<small id="quantityMessage">
				Minimum Order: 1
		</small>
</div>		
<div class="checkout-total">

	<span>Total Amount:</span>

	<strong id="checkoutTotal">₱0.00</strong>
</div>

<div class="checkout-buttons">

	<button type="button"
			class="cancel-btn"
			onclick="closeBuyNow()">
			Cancel
	</button>
	<button type="Submit"
		class="purchase-btn">
		Confirm purchase
	</button>

			</div>
		</form>
	</div>
</div>

</body>

<script>
</script>

</html>     