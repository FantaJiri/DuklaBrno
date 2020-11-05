<?php

include 'include.php';

include 'header.php';
?>



    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="display-4"> Členové týmu </h2>
            </div>

        </div>
    </div>


    <div class="container-fluid padding">
        <div class="row align-items-stretch text-center padding">
            <?php
            $staff = spustit_SQL($db, "SELECT staff.*, staff_position.name AS position FROM staff JOIN staff_position ON staff.position_id = staff_position.id");
            
            foreach ($staff as $member) {
                
                $prediction = round(spustit_SQL($db,"SELECT AVG(time) AS prediction FROM races WHERE rider_id = ".$member['id'])[0]['prediction'],3);
                $predplace = round(spustit_SQL($db,"SELECT AVG(placement) AS predplace FROM races WHERE rider_id = ".$member['id'])[0]['predplace']);
                if ($predplace < 15) $prediction = $prediction - 0.100;
                if ($predplace > 15) $prediction = $prediction + 0.100; 
                ?>

                <div class="col-xs-12 col-sm-6 col-md-4 pb-4">
                    <div class="card h-80 w-70">

                        <div class="card-body">
                            <h4 class="card-title"><?php echo $member['name']; ?></h4>
                            <div class="container-fluid">
                                <img src="<?php echo $member['photo']; ?>" style="height: 160px;"> </div>
                            <p class="card-text"><strong><?php echo $member['position']; ?></strong></p>
                            <p class="card-text"><?php echo $member['info']; ?></p>
                            <p class="card-text"><?php echo $prediction<1 ? "" : "Pravděpodobný budoucí čas na 200m: $prediction s" ; ?></p>

                            <a href="<?php echo $member['profile']; ?>" target="_blank" class="btn btn-outline-secondary center">Přejít na profil</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <hr class="my-4"> <?php if ($logged_user && $logged_user['role'] == 'admin') { ?>
        <a href="sprava_clenu.php" class="btn btn-primary">Přidat člena</a> <?php } ?>
    </div>

</body>

</html>