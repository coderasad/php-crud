<?php
    require "../model/OurModel.php";
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $om = new OurModel();
        $where =[
           'id' => $_POST['cid'],
        ];        
        $results = $om->delete("info", $where);
        if ($results) {            
            echo "Data Delete Successfully";
        }
    }
?>