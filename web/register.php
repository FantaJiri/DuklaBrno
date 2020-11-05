<?php 

include 'include.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="smoothscroll.js"></script>
    <link href="formating.css" rel="stylesheet">

</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">  <!--start of img -->
                <img src="img/bicycle.png">
                </div>                          <!--end of img-->

                <?php
                    if (isset($error)) {
                        echo "<div class='alert alert-danger m-2' role='alert'> $error </div>";
                    }
                ?>
                <form class="col-12" action="actions/register.php" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-conrol" placeholder="Uživatelské jméno">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-conrol" placeholder="Heslo">            
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_znova" class="form-conrol" placeholder="Heslo znovu">            
                    </div>

                    <input type="submit" class="btn btn-primary" value="Register">

                </form>
                <p class="text-center py-3">
                    <a href="login.php">Login</a>
                </p>
            </div>

        </div>   
    </div>
    
</body>
</html>