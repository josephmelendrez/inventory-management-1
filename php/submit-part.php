<?php

$app->post('/add/submit', function() use ($app) {
    // Set Database credentials
    if(!isset($path)){ $path = $_SERVER['DOCUMENT_ROOT'].'/php/'; }
    require $path . 'create-pdo.php';
    
    //Decode JSON object and convert o PHP Data object
    
    $data = json_decode($_POST['data']);
    var_dump($data);
    //Add protections against submitting multiple parts at once.
    
    //Test if part exists
    
    $db = initDbConn();
    
    var_dump($db);
    
    $stmt = $db->query("SELECT COUNT(*) FROM `parts` WHERE part_num=?");
    echo "query prepared";
    $stmt->execute($data['part_num']);
    echo "query executed";
    $numRows = $stmt->fetchColumn();
    echo "result fetched. numRows = " . $numRows;
    
    var_dump($numRows);

    if ($numRows == 0){
        //Insert new row
        //Insert
    } else {
        //Error out if part already exists
        printf("Error: Part %s already exists", $_POST['partNumber']);
        //exit();
    }  
    
    
    
});