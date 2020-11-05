<?php

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>



<div class="row justify-content-center">
    <div class="col-12 text-center">
        <h2 id="members" class="display-4"> Členové </h2>
    </div>
    <div class="container-fluid pl-4"> <a href="account.php" class="btn btn-primary">Zpět</a>
        <div class="row text-center pt-4">
            <table class="table table-sm table-bordered mx-5">
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


                    foreach ($users as $user) { ?>
                        <tr>
                            <th> <?php echo $user['id'] ?> </th>
                            <td> <?php echo $user['name'] ?> </td>
                            <td> <?php echo $user['role'] ?> </td>
                            <td> <a href="actions/delete_user.php?id=<?php echo $user['id'] ?>" class="btn btn-danger btn-sm">Smazat</a> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>
        <a href="account.php" class="btn btn-primary">Zpět</a>
        <hr class="my-4">
    </div>
</div>


</body>

</html>