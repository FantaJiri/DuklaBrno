<?php

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}

include 'header.php';
?>



<div class="col-12 text-center">
    <h2 id="members" class="display-4"> Správa účtu </h2>
</div>
<div class="container-fluid padding">
    <div class="row text-center padding py-4">
        <div class="col-xs-12 col-sm-6 col-md-4 mt-3">
            <h3> <?php echo $logged_user['name'] ?> </h3>
            <p> Role: <strong> <?php echo $logged_user['role'] ?></strong> </p>

            <?php if ($logged_user['role'] == 'admin') { ?>
                <div class="btn-group">
                    <a href="sprava.php" class="btn btn-primary">Správa uživatelů</a>
                    <a href="sprava_info.php" class="btn btn-primary">Správa statických informací</a>
                    <a href="sprava_clenu.php" class="btn btn-primary">Správa členů týmu</a>
                    <a href="sprava_zavodu.php" class="btn btn-primary">Správa závodů</a>
                </div>
            <?php } ?>

        </div>
                <!-- Změna hesla -->

        <div class="col-xs-12 col-sm-5 col-md-3 mt-3">
            <h3> Změna hesla </h3>

            <form action="actions/change_password.php" method="POST">

                <div class="form-group">
                    <input type="password" name="password_stare" class="form-conrol" placeholder="Staré Heslo">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-conrol" placeholder="Nové Heslo">
                </div>
                <div class="form-group">
                    <input type="password" name="password_znova" class="form-conrol" placeholder="Heslo znovu">
                </div>

                <input type="submit" class="btn btn-sm btn-primary" value="Změnit">

            </form>
        </div>

        <!-- Vložení komentářů -->
        <div class="col-xs-12 col-sm-7 col-md-5 mt-3">            
            <?php if ($logged_user) { ?>
                <!-- <div class="col-sm-12 col-md-4 text-center"> -->
                <h3> Vložit komentář </h3>
                <form action="actions/add_comment.php?id=<?php echo $logged_user['id'] ?>" method="POST">

                    <div class="form-group">
                        <textarea class="form-conrol" name="text" cols="40" rows="5"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Vložit komentář">

                </form>
        </div>

        <!-- Mazání komentářů -->

        <?php if ($logged_user['role'] == 'admin') { ?>
            <div class="ml-3">
            <form action="actions/edit_info.php" method="post">
                <div class="col-12 text-center mt-3 ml-2">
                    <h2 id="members" class="display-4"> Komentáře </h2>
                </div>
                <div class="container-fluid padding text-center ">
                    <div class="col row text-center padding pt-2 ml-1">

                        <table class="table table-sm table-bordered my-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Jmeno</th>
                                    <th scope="col">Koment</th>
                                    <th scope="col">Čas</th>
                                    <th scope="col">Akce</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $comments = spustit_SQL($db, "SELECT comments.*, users.name FROM comments JOIN users ON users.id = comments.user_id");
                                //      $name =spustit_SQL($db, "SELECT name FROM `users` WHERE id IN (SELECT user_id FROM comments )"); 


                                foreach ($comments as $comment) {

                                ?>
                                    <tr>
                                        <th> <?php echo $comment['id'] ?> </th>
                                        <td>
                                            <?php echo $comment['name'];

                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (strlen($comment['text']) > 20) {
                                                echo substr($comment['text'], 0, 21) . " ...";
                                            } else {
                                                echo $comment['text'];
                                            }
                                            ?>
                                        </td>
                                        <td> <?php echo $comment['date'] ?> </td>

                                        <td>

                                            <a href="actions/delete_comment.php?id=<?php echo $comment['id'] ?>" class="btn btn-sm btn-danger">Smazat</a>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>



                    </div>
                 </div>
            </form> </div>
    <?php }
            } ?>
    </div>
</div>
<hr class="my-4">
</div>

</body>

</html>