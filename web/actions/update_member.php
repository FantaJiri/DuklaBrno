<?php

include '../include.php';


if ($_POST && $_POST['name'] && $_POST['info'] && $_POST['profile'] && $_POST['position']) {
  $name = $_POST['name'];
  $info = $_POST['info'];
  $profile = $_POST['profile'];
  $position = $_POST['position'];

  spustit_SQL($db, "UPDATE staff SET  name='$name', info='$info', profile='$profile',position_id='$position' WHERE id=" . $_GET['id']);
  if ($_FILES["photo"]["size"]!=0) {
    $target_dir = "../img/staff/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
      spustit_SQL($db, "UPDATE staff SET photo='$target_file' WHERE id=" . $_GET['id']);

      
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  odkaz_zprava('sprava_clenu.php', 'Člen upraven.');
}
