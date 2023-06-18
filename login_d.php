<?php
$db = include "connect.php"; // Include the database connection file

if (isset($_POST['kode']) && isset($_POST['password'])) {
    $kode = $_POST['kode'];
    $password = $_POST['password'];

    // Query to check if the username and password match
    $query = "SELECT * FROM tb_dokter WHERE kode_d = '$kode' AND password = '$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];

        session_start();
        $_SESSION['user_id'] = $userId;
        $_SESSION['login'] = true;

        // Login successful
        // Redirect to the dashboard page
        header("Location: dashboard_d.php");
        exit();
    } else {
        // Login failed
        $errorMessage = "Invalid username or password";
    }

    // Close the database connection
    mysqli_close($db);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Dokter</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text&family=Ysabeau:wght@100&display=swap" rel="stylesheet">
    <style>
        .container{
            margin-top: 10%;
        }
        body {
            background: linear-gradient(to top,#FFAEBC,#A0E7E5);
            background-repeat: no-repeat;
            background-position: center bottom;
            background-attachment: fixed;
        }

        .login-form {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            padding: 50px;
            border-radius: 20px;
            background-color: #fff;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center my-5" style="font-family: 'Wix Madefor Text', sans-serif;">Login Dokter</h1><br>
                <?php if(isset($errorMessage)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php } ?>
                <form method="POST" action="" class="login-form" >
                    <div class="form-group">
                        <label for="kode">kode</label>
                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Enter kode dokter">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>