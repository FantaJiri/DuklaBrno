<?php

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>


    <!--side body-->
    <div class="row justify-content-center">
        <form action="actions/create_info.php" method="post">
            <div class="col-12 text-center">
                <h2 id="members" class="display-4"> Statické informace </h2>
            </div>
            <div class="container-fluid"> <a href="account.php" class="btn btn-primary">Zpět</a>
                <div class="row text-center pt-3">
                    <table class="table table-sm table-bordered mx-5">
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
                            $infos = spustit_SQL($db, "SELECT * FROM info");


                            foreach ($infos as $info) { ?>
                                <tr>
                                    <th> <?php echo $info['id'] ?> </th>
                                    <td> <?php echo $info['name'] ?> </td>
                                    <td>
                                        <?php
                                        if (strlen($info['text']) > 20) {
                                            echo substr($info['text'], 0, 21) . " ...";
                                        } else {
                                            echo $info['text'];
                                        }
                                        ?>
                                    </td>
                                    <td> <?php echo $info['role'] ?> </td>
                                    <td>
                                        <a href="info.php?id=<?php echo $info['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                                        <a href="actions/delete_info.php?id=<?php echo $info['id'] ?>" class="btn btn-sm btn-danger">Smazat</a>
                                    </td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <th></th>
                                <td>
                                    <input class="form-control mb-2 mr-sm-2" type="text" name="name">
                                </td>
                                <td>
                                    <textarea class="form-control mb-2 mr-sm-2" name="text" cols="40" rows="6"></textarea>
                                </td>
                                <td>
                                    <select class="form-control mb-2 mr-sm-2" name="role">
                                        <option value="public">Public</option>
                                        <option value="user">User only</option>
                                        <option value="admin">Admin only</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-sm btn-primary" value="Přidat">
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </div>
                <hr class="my-4">
        </form>
        <a href="account.php" class="btn btn-primary">Zpět</a>
    </div>
    </div>


</body>

</html>