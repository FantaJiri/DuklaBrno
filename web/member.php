<?php 

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}   
include 'header.php';
?>


<div class="row justify-content-center">
<form action="actions/update_member.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="col-12 text-center">
            <h2 id="members" class="display-4"> Členové týmu </h2>
    </div>
    <div class="container-fluid padding"> <a href="sprava_clenu.php" class="btn btn-primary btn-lg active">Zpět</a>
    <div class="row text-center padding py-4">
            <table class="table table-bordered mx-5">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Jmeno</th>
                <th scope="col">Info</th>
                <th scope="col">Profil</th>
                <th scope="col">Fotografie</th>
                <th scope="col">Pozice</th>
                <th scope="col">Akce</th>
                </tr>
            </thead>
            <tbody>
            
                <?php 
                    $staff = spustit_SQL($db, "SELECT * FROM staff WHERE id=". $_GET['id'])[0];
                    $staff_position = spustit_SQL($db, "SELECT * FROM staff_position");
                ?>
                    <tr>
                    <th><?php echo $staff['id']?></th>
                        <td> 
                            <input class="form-control"  type="text" name="name" value="<?php echo $staff['name'] ?>">
                        </td>
                        <td> 
                        <input class="form-control"  type="text" name="info" value="<?php echo $staff['info'] ?>">
                           <!-- <textarea class="form-control" name="info"></textarea>-->
                        </td>
                        <td> 
                        <input class="form-control"  type="text" name="profile" value="<?php echo $staff['profile'] ?>">
                        <!--<textarea class="form-control" name="profile"></textarea>-->
                        </td>
                        <td> 
                        <input class="form-control"  type="file" name="photo" >
                        <!--<textarea class="form-control" name="profile"></textarea>-->
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
                            <input type="submit" class="btn btn-primary" value="Uložit">
                        </td>
                    </tr>
            </tbody>
            </table>



    </div>
    </div>
    <hr class="my-4">
</form>
</div>


</body>
</html>

