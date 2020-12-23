<?php
    require "../model/OurModel.php";
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $om = new OurModel();
        $data =[
           'countryName' => $_POST['countryName'],
           'shortName' => $_POST['shortName'],
           'code' => $_POST['code']
        ]; 
        $where =[
           'id' => $_POST['cid']
        ];        
        $results = $om->update("info",$data, $where);
        if ($results) {
            echo "Data update Successfully";
        }
    }
?>