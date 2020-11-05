<?php

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>


<div class="row justify-content-center">
<form action="actions/update_race.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="col-12 text-center">
        <h2 id="members" class="display-4"> Úprava závodu </h2>
    </div>
    <div class="container-fluid padding"> <a href="sprava_zavodu.php" class="btn btn-primary btn-lg active">Zpět</a>
        <div class="row text-center padding py-4">
            <table class="table table-bordered mx-5">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Závod</th>
                        <th scope="col">Závodník</th>
                        <th scope="col">čas</th>
                        <th scope="col">Umístění</th>
                        <th scope="col">Akce</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $race = spustit_SQL($db, "SELECT * FROM races WHERE id=" . $_GET['id'])[0];
                    $riders = spustit_SQL($db, "SELECT * FROM staff WHERE position_id = 2");
                    ?>
                    <tr>
                        <th><?php echo $race['id'] ?></th>
                        <td>
                            <input class="form-control" type="text" name="name" value="<?php echo $race['name'] ?>">
                        </td>
                        <td>
                            <select class="form-control" name="rider">
                                <?php
                                foreach ($riders as $rider) {
                                    $id = $rider['id'];
                                    $name = $rider['name'];

                                    echo "<option value='$id'>$name</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control mb-2 mr-sm-2 smin" type="number" step="0.001" name="time" value="<?php echo $race['time'] ?>"> sekund

                        </td>
                        <td>
                        <input class="form-control mb-2 mr-sm-2 smin"  type="number" name="placement" value="<?php echo $race['placement'] ?>">

                        </td>
                        <td>
                            <input type="submit" class="btn btn-primary" value="Uložit">
                        </td>
                    </tr>
                </tbody>
            </table>



        </div>
        <hr class="my-4">
</form>
</div>


</body>

</html>