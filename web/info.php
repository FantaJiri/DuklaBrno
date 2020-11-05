<?php 

include 'include.php';

if (!$logged_user) {
    odkaz('index.php');
}
include 'header.php';
?>



<form action="actions/update_info.php?id=<?php echo $_GET['id'] ?>" method="post">
    <div class="col-12 text-center">
            <h2 id="members" class="display-4"> Statické informace </h2>
    </div>
    <div class="container-fluid padding"><a href="sprava_info.php" class="btn btn-primary">Zpět</a>
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
                    $info = spustit_SQL($db, "SELECT * FROM info WHERE id=". $_GET['id'])[0];
                 ?>

                    <tr>
                        <th><?php echo $info['id'] ?></th>
                        <td> 
                            <input class="form-conrol"  type="text" name="name" value="<?php echo $info['name'] ?>">
                        </td>
                        <td> 
                            <textarea  class="form-conrol"  name="text" cols="40" rows="6"><?php echo $info['text'] ?></textarea>
                        </td>
                        <td> 
                            <select class="form-conrol"  name="role">
                                <option value="public" <?php echo $info['role'] == 'public' ? "selected" : "" ?> >Public</option>
                                <option value="user" <?php echo $info['role'] == 'user' ? "selected" : "" ?>>User only</option>
                                <option value="admin" <?php echo $info['role'] == 'admin' ? "selected" : "" ?>>Admin only</option>
                            </select>
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

