<?php

//start the session
session_start();
if (isset($_SESSION["user"]))
    header('location:dashboard.php');

$error_message = '';
if ($_POST) {

    include('../database/connection.php'); //connection to databse

    $username = $_POST['username'];
    $password = $_POST['password'];
    // Prepare the SQL query using placeholders for the email and password
    $query = 'SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1';

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind the parameters to the placeholders
    $stmt->bindParam(':email', $username);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a user was found
    if ($user) {
        // User found, do something
        $_SESSION['user'] = $user;
        echo "User authenticated successfully.";
    } else {
        // User not found
        echo "Invalid email or password.";
    }




    if ($stmt->rowCount() > 0) {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        // $_SESSION['user'] = $user;

        header('Location: dashboard.php');
    } else
        $error_message = 'Please make sure that username and password are correct';

}

?>

<!DOCTYPE html>
<html>

<head>
    <title> Sutra Style Login - Sutra Style Managment System </title>

    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body id="loginBody">

    <?php

    if (!empty($error_message)) {

        ?>

        <div id="errorMessage">
            <strong>ERROR:</strong></p> <?= $error_message ?></p>
        </div>

    <?php } ?>

    <div class="container">
        <div class="loginHeader">
            <h1>Sutra Style</h1>
            <p>Your pathway to fashion</p>

        </div>

        <div class="loginBody">
            <form action="" method="POST">

                <div class="loginInputContainer">
                    <label for="">Username</label>
                    <input placeholder="username" name="username" type="text" />
                </div>

                <div class="loginInputContainer">
                    <label for="">Password</label>
                    <input placeholder="password" name="password" type="password" />
                </div>

                <div class="loginButtonContainer">
                    <button>login</button>
                </div>



            </form>


        </div>
    </div>

</body>

</html>