<?php 

include 'include.php';
include 'header.php';
?>




<div class="center my-4 py-2">
    <h1 id="home">Webová stránka Dukly Brno</h1>
</div>
<!--Image Slider-->
<div id="slides" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
    <li data-target="#slides" data-slide-to="0" class="active"></li>
    <li data-target="#slides" data-slide-to="1"></li>
    <li data-target="#slides" data-slide-to="2"></li>
    

</ul>
    <div class="carousel-inner">
        <div class="carousel-item center active">
            <img src="img/background1.png" class="img-fluid">
        </div>
        <div class="carousel-item center">
            <img src="img/background2.png" class="img-fluid">
        </div>
        <div class="carousel-item center">
            <img src="img/background3.png" class="img-fluid">
        </div>
    </div>
</div>

<!-- About Team -->

<div class="container-fluid padding">
<div class="row welcome text-center">
    <div class="col-12">
        <h2 id="about" class="display-4"> O týmu Dukla Brno. </h2>
    </div>
    
    <div class="col-12">
        <p class="lead">
            
            <?php zobraz_info($db, 'o_tymu'); ?>

            <?php zobraz_info($db, 'info_pro_cleny'); ?>

            <?php zobraz_info($db, 'info_pro_adminy'); ?>
            
        </p>
    </div>
</div>
</div>



<!--comments --> <!--three column-->
<div class="col-12 text-center">
        <h2 id="members" class="display-4"> Komentáře: </h2>
</div>
<div class="container-fluid padding">
    <div class="row text-center padding justify-content-center">
    <table class="table table-bordered my-0 col-6">
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th scope="col">Jmeno</th>
                                        <th scope="col">Koment</th>
                                        <th scope="col">Čas</th>
                                
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $comments = spustit_SQL($db, "SELECT comments.*, users.name FROM comments JOIN users ON users.id = comments.user_id");
                                    //      $name =spustit_SQL($db, "SELECT name FROM `users` WHERE id IN (SELECT user_id FROM comments )"); 


                                    foreach ($comments as $comment) {

                                    ?>
                                        <tr>
                                    
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

                                            
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>
    </div>
    <?php if($logged_user && $logged_user['role'] == 'admin')  {?>                   
    <a class="btn btn-primary text-center" href="account.php">Uprav komentář</a> 
     <?php } elseif($logged_user)  {?>                   
    <a class="btn btn-primary text-center" href="account.php">Vlož komentář</a> 
     <?php } ?>
    
     <hr class="my-4">
</div>

<!--social networks-->

    <div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-12">
            <h2 id="connect"> Sociální sítě </h2>
        </div>
        
        <div class="col-12 social zvetseni pb-4">
            <a href="https://www.facebook.com/duklabrnosprint/" target="_blank"><i class="fab fa-facebook-square fa-3x mx-2"></i></a>
            <a href="https://www.instagram.com/duklabrno/" target="_blank"><i class="fab fa-instagram fa-3x mx-2"></i></a>
            <a href="https://www.youtube.com/channel/UCFDlIvNyk96jeH3TvJdlMbA" target="_blank"><i class="fab fa-youtube fa-3x mx-2"></i></a>
        </div>
    </div>
    </div>


</body>
</html>

