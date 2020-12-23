<?php
    require "../model/OurModel.php";
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $om = new OurModel();
        $data =[
            'countryName' => $_POST['countryName'],
            'shortName' => $_POST['shortName'],
            'code' => $_POST['code'],
        ];
        
        $results = $om->insert("info", $data);
        if ($results) {
            echo "Data Insert Successfully";
        }
    }
?>