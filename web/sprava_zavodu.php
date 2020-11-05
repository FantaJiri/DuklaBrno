<?php 

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>


<!--side body-->
<div class="row justify-content-center">
<form class="form-inline" action="actions/create_race.php" method="post">
    <div class="col-12 text-center padding pt-4">
            <h2 id="races" class="display-4"> Správa závodů </h2>
    </div>
    <div class="container-fluid"> <div class="ml-2"><a href="account.php" class="btn btn-primary">Zpět</a></div>
    <div class="row text-center">
    
            <table class="table table-sm table-bordered mx-5 mt-5">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Závod</th>
                <th scope="col">Závodník</th>
                <th scope="col">Čas</th>
                <th scope="col">Umístění</th>
                <th scope="col">Akce</th>
                </tr>
            </thead>
            <tbody>
            
                <?php 
                    $races = spustit_SQL($db, "SELECT races.*, staff.name AS rider FROM races JOIN staff ON races.rider_id = staff.id");
                    $riders = spustit_SQL($db,"SELECT * FROM staff WHERE position_id = 2");
                    foreach ($races as $race) { ?>
                        
                        <tr><div class="col-xs-12 col-sm-6 col-md-4">
                            <th> <?php echo $race['name'] ?> </th>
                            <td> <?php echo $race['rider'] ?> </td>
                            <td> <?php echo $race['time'] ?> </td>
                            <td> <?php echo $race['placement'] ?> </td>
                            <td>
                                <a href="race_edit.php?id=<?php echo $race['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                                <a href="actions/delete_race.php?id=<?php echo $race['id'] ?>" class="btn btn-sm btn-danger">Smazat</a>
                            </td>
                        </tr>
                                </div>
                    <?php } ?>

                    <tr>
                
                        <td> 
                            <input class="form-control mb-2 mr-sm-2"  type="text" name="name">
                        </td>
                        <td> 
                        <select class="form-control" name="rider">
                             <?php
                                    foreach ($riders as $rider){
                                      $id=$rider['id'];
                                      $name=$rider['name'];
                                      
                                      echo "<option value='$id'>$name</option>";
                                    }
                             ?> 
                        </select>
                        </td>
                        <td> 
                        <input class="form-control mb-2 mr-sm-2 smin"  type="number" step="0.001" name="time">sekund
                        <!--<textarea class="form-conrol" name="profile"></textarea>-->
                        </td>
                        <td> 
                        <input class="form-control mb-2 mr-sm-2 smin"  type="number" name="placement">
                        <!--<textarea class="form-conrol" name="profile"></textarea>-->
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
<div class="ml-2"><a href="account.php" class="btn btn-primary">Zpět</a></div>
</div></div>


</body>
</html>

