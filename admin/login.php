<?php include_once 'inc/header.php'; ?>

<?php

    // check if user has pressed login 
    if(isset($_POST['login'])) {

        $username = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        // check if there is input
        if(!isset($username) || empty($username)) {
            $errors[] = "Please enter email address.";
        }

        if(!isset($password) || empty($password)) {
            $errors[] = "Please enter password.";
        }

        if(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter valid email.";
        }

        // Process login if there is no error
        if(count($errors) == 0) {
            // please use other way of encription
            $password = md5($password); 
            $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password' LIMIT 1";
            $result = mysqli_query($db, $query);
            
            if(!$result->num_rows) {
                $errors[] = "Username/Password incorrect.";
            } else {
                while($row = mysqli_fetch_assoc($result)) {
                    $user_id = $row['id'];
                    $_SESSION['user_id'] = $user_id;
                    redirect_to('index.php');
                }
            }
        }
    }

?>

<div class="row">
    <div class="col-md-5 m-auto">
        <div class="card-bg-light">
            <div class="card-header">
                Login
            </div>

            <div class="card-body">

            <?php
            // display for error if any
                if(count($errors) > 0) {
                    echo '<div class="alert alert-danger">';
                    foreach($errors as $error) {
                        echo $error . '<br>';
                    }
                    echo '</div>';
                }
            ?>


                <form action="login.php" method="post">
                
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="admin@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>


                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>   