<?php 

include 'include.php';

include 'header.php';
?>



<form action="actions/update_info.php?id=<?php echo $_GET['id'] ?>" method="post">
    <div class="col-12 text-center">
            <h2 id="members" class="display-4"> Historie týmu    </h2>
    </div>
    <div class="container-fluid padding">
            
<?php zobraz_info($db, 'historie'); ?>

    </div>
</form>

</div>


</body>
</html>

