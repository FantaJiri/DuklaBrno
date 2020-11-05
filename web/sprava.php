<?php

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>


<!--site body-->
<div class="row justify-content-center">
<form>
    <div class="col-12 text-center padding pt-4">
        <h2 id="members" class="display-4"> Členové</h2>
    </div>
    <div class="container-fluid padding">
        <div class="ml-2"><a href="account.php" class="btn btn-primary">Zpět</a></div>
        <div class="row text-center pl-4">

        <table class="table table-sm table-bordered mx-5 mt-5">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Jmeno</th>
                        <th scope="col">Role</th>
                        <th scope="col">Smazat</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $users = spustit_SQL($db, "SELECT * FROM users");


                    foreach ($users as $user) { 
                    ?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <tr>
                                <td> <?php echo $user['id'] ?> </td>
                                <td> <?php echo $user['name'] ?> </td>
                                <td> <?php echo $user['role'] ?> </td>
                                <td> <a href="actions/delete_user.php?id=<?php echo $user['id'] ?>" class="btn btn-danger btn-sm">Smazat</a> </td>
                            </tr>
                        </div>
                    <?php } ?>
                </tbody>
            </table>



        </div>
        <hr class="my-4">
        </form>
        <div class="ml-2"><a href="account.php" class="btn btn-primary">Zpět</a></div>
    </div>
</div>


</body>

</html>