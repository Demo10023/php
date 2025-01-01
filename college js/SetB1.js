<!DOCTYPE html>
<html>
<head>
    <title>Membership Form Validation</title>
    <script>
        function validateForm() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            let errorMessage = '';

            if (username === '' || username.length < 5) {
                errorMessage += 'Username must be at least 5 characters long.\n';
            }

            if (password === '' || password.length < 8) {
                errorMessage += 'Password must be at least 8 characters long.\n';
            }

            if (errorMessage) {
                alert(errorMessage);
                return false;
            } else {
                alert('Form submitted successfully!');
                return true;
            }
        }
    </script>
</head>
<body>

    <h1>Membership Form</h1>
    <form onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
