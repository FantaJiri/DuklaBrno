<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dukla Brno</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="https://kit.fontawesome.com/2d93361eb9.js" crossorigin="anonymous"></script>
    <script defer src="smoothscroll.js"></script>
    <script>
        window.onload = function() {
            document.getElementsByClassName('souhrn')[0].parentNode.removeChild(document.getElementsByClassName('souhrn')[0]);
        }
    </script>
    <link href="formating.css" rel="stylesheet">
</head> 

<body>

    <?php echo zobraz_zpravu() ?>

    <!--navbar-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/dukla_header_new_2.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse najezd" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Domů</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#about">O týmu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="historie.php">Historie týmu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="staff.php">Členové</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#connect">Sociální sítě</a>
                    </li>

                    <?php if ($logged_user) { ?>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                User: <strong> <?php echo $logged_user['name'] ?> </strong>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-primary" href="account.php">Account</a>
                                <a class="dropdown-item text-danger" href="actions/logout.php">Logout</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Log in/Registrace</a>
                        </li>
                    <?php } ?>


                </ul>

            </div>
        </div>
    </nav>