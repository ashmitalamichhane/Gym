<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form validation and data insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership = $_POST['membership'];
    $branch = $_POST['branch'];
    $message = $_POST['message'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO customerinformation (Name, Email, ContactNumber, PreferredMembershipID, PreferredBranchID, Message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $membership, $branch, $message);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        header('location: Dashboard.html');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Free Trail</title>
    <link rel="stylesheet" href="Book a membership.css">
</head>
<body>
    <header>
        <h2 class="Logo">ALPHA🏋️</h2>
        <nav class="navigation">
            <a href="index.php">HOME</a>
            <a href="Aboutus.php">ABOUT US</a>
            <a href="Price & packages.php">PRICE&PACKAGES</a>
        </nav>
    </header>

    <div class="container">
        <form action="" method="POST" class="form">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail *</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required>
            </div>
            <div class="form-group">
                <label for="phone">Contact Number *</label>
                <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required>
            </div>
            <div class="form-group">
                <label for="branch">Which Branch Do You Prefer? *</label>
                <select id="branch" name="branch" required>
                    <option value="" disabled selected>Select a branch....</option>
                    <option value="1">Kumaripati</option>
                    <option value="2">Dhapakhel</option>
                    <option value="3">Lagankhel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="timing">Preferred Membership? *</label>
                <select id="timing" name="membership" required>
                    <option value="" disabled selected>Select a Membership....</option>
                    <option value="1">Regular Membership</option>
                    <option value="2">Day Time Membership</option>
                    <option value="3">Personal Training</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Want to leave a message?</label>
                <textarea id="message" name="message" placeholder="Your Message"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
       
    
