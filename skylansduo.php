<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Information</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device=width, initial-scale=1.0">

	<link rel="stylesheet" href="SI.css">

</head>
<body>
	<?php
include 'SIconnect.php';

$sql = "SELECT * FROM information";
$result = $conn->query($sql);
?>
<div class="header">   STUDENT INFORMATION </div>
<div class="Toolbar">
	<div>
		<label>Students Category: &nbsp; </label>
		<select>
		<option>ALL Students</option>
		<option>Male</option>
		<option>Female</option>
		</select>
	</div>
	<button action="" Method="Post">
		Add Student Button</button>
</div>

	<div class="Main-Container">
		<?php
if ($result && $result->num_rows > 0) {

	while ($INFO = $result->fetch_assoc()) {
?>
		<div class="Students-Container">
			<div>LRN <?php echo (int)($INFO['LRN']); ?></div>	
			<div>FIRST NAME: <?php echo htmlspecialchars($INFO['FN']); ?></div>
			<div>LAST NAME: <?php echo htmlspecialchars($INFO['LN']); ?></div>
			<div>MIDDLE INITIAL: <?php echo htmlspecialchars($INFO['MI']); ?></div>
			<div>AGE: <?php echo htmlspecialchars($INFO['AGE']); ?></div>
			<div>GENDER: <?php echo htmlspecialchars($INFO['GENDER']); ?></div>
			<div>BIRTHDAY: <?php echo htmlspecialchars($INFO['BD']); ?></div>
			<div>ADDRESS: <?php echo htmlspecialchars($INFO['ADDRESS']); ?></div>
			<div>CONTACT NUMBER: <?php echo htmlspecialchars($INFO['CN']); ?></div>
			<div>EMAIL: <?php echo htmlspecialchars($INFO['EMAIL']); ?></div>
		</div>

<div>


<?php
}
} else {
	echo "<p>Information Unavailable!</p>";
}
$conn->close();
?>
</div>
</body>
</html>