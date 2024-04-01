<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h2>Change Password</h2>
    <!-- Button to open the password change form -->
    <button id="changePasswordBtn">Change Password</button>
    
    <!-- Password change form (hidden by default) -->
    <form id="passwordChangeForm" action="change_password.php" method="post" style="display: none;">
        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password"><br><br>
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password"><br><br>
        <label for="confirm_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br><br>
        <input type="submit" value="Change Password">
    </form>

    <script src="script.js"></script> <!-- Link to your JavaScript file -->
</body>
</html>