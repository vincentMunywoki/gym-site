<!DOCTYPE html>
<html>
<head>
	<title>Gym Booking Form</title>
	<style>
		/* Your styles here */
	</style>
</head>
<body>
	<?php
		if (isset($_POST['submit'])) {
			// Get the form data
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$date = $_POST['date'];
			$time = $_POST['time'];
			$message = $_POST['message'];

			// Validate the form data
			if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time)) {
				echo "<p>Please fill in all required fields.</p>";
			} else {
				// Send an email with the form data
				$to = "youremail@example.com";
				$subject = "New Gym Booking";
				$body = "Name: $name\nEmail: $email\nPhone: $phone\nDate: $date\nTime: $time\nMessage: $message";
				$headers = "From: $email";

				if (mail($to, $subject, $body, $headers)) {
					echo "<p>Thank you for your booking. We will contact you shortly.</p>";
				} else {
					echo "<p>There was an error sending your booking. Please try again later.</p>";
				}
			}
		}
	?>

	<h1>Gym Booking Form</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>

		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone" required>

		<label for="date">Date:</label>
		<input type="date" id="date" name="date" required>

		<label for="time">Time:</label>
		<input type="time" id="time" name="time" required>

		<label for="message">Message:</label>
		<textarea id="message" name="message"></textarea>

		<input type="submit" name="submit" value="Book Now">
	</form>
</body>
</html>