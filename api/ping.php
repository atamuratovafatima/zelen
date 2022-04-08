<?php
if ($_POST['JSON']=='true') 
  {
      var_dump(json_decode($_POST['JSON_data']));
    } 
else {
    var_dump($_POST);
}
?>