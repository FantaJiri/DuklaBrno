<?php 

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>


<!--side body-->
<div class="row justify-content-center">
<form class="form-inline" action="actions/create_member.php" method="post">
    <div class="col-12 text-center padding pt-4">
            <h2 id="members" class="display-4"> Správa závodů </h2>
    </div>
    <div class="container-fluid"> <div class="ml-2"><a href="account.php" class="btn btn-primary">Zpět</a></div>
    <div class="row text-center">
    
            <table class="table table-sm table-bordered mx-5 mt-5">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Závodník</th>
                <th scope="col">Čas</th>
                <th scope="col">Umístění</th>
                <th scope="col">Akce</th>
                </tr>
            </thead>
            <tbody>
            
                <?php 
                    $staff = spustit_SQL($db, "SELECT races.*, staff.name AS position FROM staff JOIN staff_position ON staff.position_id = staff_position.id");
                    $staff_position = spustit_SQL($db, "SELECT * FROM staff_position");

                    foreach ($staff as $member) { ?>
                        
                        <tr><div class="col-xs-12 col-sm-6 col-md-4">
                            <th> <?php echo $member['id'] ?> </th>
                            <td> <?php echo $member['name'] ?> </td>
                            <td> 
                                <?php
                                    if (strlen($member['info']) > 20) {
                                        echo substr( $member['info'], 0, 21 ) . " ...";
                                    } else {
                                        echo $member['info'];
                                    }
                                ?>
                            </td>
                            <td> <?php echo $member['position'] ?> </td>
                            <td> <?php echo $member['profile'] ?> </td>
                            <td>
                                <a href="race_edit.php?id=<?php echo $member['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                                <a href="actions/delete_member.php?id=<?php echo $member['id'] ?>" class="btn btn-sm btn-danger">Smazat</a>
                            </td>
                        </tr>
                                </div>
                    <?php } ?>

                    <tr>
                    <th></th>
                        <td> 
                            <input class="form-control mb-2 mr-sm-2"  type="text" name="name">
                        </td>
                        <td> 
                        <input class="form-control mb-2 mr-sm-2"  type="text" name="info">
                           <!-- <textarea class="form-conrol" name="info"></textarea>-->
                        </td>
                        <td> 
                        <select class="form-control" name="position">
                             <?php
                                    foreach ($staff_position as $pos){
                                      $id=$pos['id'];
                                      $name=$pos['name'];
                                      
                                      echo "<option value='$id'>$name</option>";
                                    }
                             ?> 
                        </select>
                        <!-- <textarea class="form-control" name="profile"></textarea>-->
                        </td>
                        <td> 
                        <input class="form-control mb-2 mr-sm-2"  type="text" name="profile">
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

