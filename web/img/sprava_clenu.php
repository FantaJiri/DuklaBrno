<?php 

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dukla Brno</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2d93361eb9.js" crossorigin="anonymous"></script>
    <script src="smoothscroll.js"></script>
    <link href="formating.css" rel="stylesheet">
</head>
<body>

<?php echo zobraz_zpravu() ?>

<!--navigation-->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/dukla_header_new_2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span> 
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Domů</a>
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

        <?php if($logged_user){ ?>
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
                    <a class="nav-link" href="login.php">Log in</a>
                </li>  
        <?php } ?>
    

        </ul>
       
    </div>
</div>
</nav>

<form action="actions/create_member.php" method="post">
    <div class="col-12 text-center">
            <h2 id="members" class="display-4"> Členové týmu </h2>
    </div>
    <div class="container-fluid padding"> <a href="account.php" class="btn btn-primary btn-lg active">Zpět</a>
    <div class="row text-center padding py-4">
            <table class="table table-bordered mx-5">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Jmeno</th>
                <th scope="col">Text</th>
                <th scope="col">Role</th>
                <th scope="col">Akce</th>
                </tr>
            </thead>
            <tbody>
            
                <?php 
                    $staff = spustit_SQL($db, "SELECT * FROM staff");


                    foreach ($staff as $member) { ?>
                        <tr>
                            <th> <?php echo $member['id'] ?> </th>
                            <td> <?php echo $member['name'] ?> </td>
                            <td> 
                                <?php
                                    if (strlen($member['text']) > 20) {
                                        echo substr( $member['text'], 0, 21 ) . " ...";
                                    } else {
                                        echo $member['text'];
                                    }
                                ?>
                            </td>
                            <td> <?php echo $member['role'] ?> </td>
                            <td>
                                <a href="member.php?id=<?php echo $member['id'] ?>" class="btn btn-warning">Upravit</a>
                                <a href="actions/delete_member.php?id=<?php echo $member['id'] ?>" class="btn btn-danger">Smazat</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <th></th>
                        <td> 
                            <input class="form-conrol"  type="text" name="name">
                        </td>
                        <td> 
                            <textarea class="form-conrol"  name="text" cols="40" rows="6"></textarea>
                        </td>
                        <td> 
                            <select class="form-conrol"  name="role">
                                <option value="public">Public</option>
                                <option value="user">User only</option>
                                <option value="admin">Admin only</option>
                            </select>
                        </td>
                        <td> 
                            <input type="submit" class="btn btn-primary" value="Přidat">
                        </td>
                    </tr>
            </tbody>
            </table>



    </div>
    <hr class="my-4">
</form>
<a href="account.php" class="btn btn-primary btn-lg active">Zpět</a>
</div>


</body>
</html>

