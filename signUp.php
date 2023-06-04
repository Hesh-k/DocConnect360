<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <form id="registrationForm" action="#" method="post" onsubmit="return validateForm()">
            <h2>User Registration</h2>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <label for="male">
                    <input type="radio" id="male" name="gender" value="male" required> Male
                </label>
                <label for="female">
                    <input type="radio" id="female" name="gender" value="female" required> Female
                </label>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I accept the terms and conditions</label>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <div class="form-group">
                <p>Already a user? <a href="#">Log in</a></p>
            </div>
        </form>
        <div id="validationError" class="form-group"></div>
    </div>
</body>
</html>
