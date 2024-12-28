<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Validation</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" value="Validate">
        </form>

        <div class="result">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<span style='color:green;'>$email is a valid email address.</span>";
                } else {
                    echo "<span style='color:red;'>$email is not a valid email address.</span>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
