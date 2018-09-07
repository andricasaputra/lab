<?php

    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "lab_db");
    define("MyTable", "input_permohonan");

    $connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die("Impossible to access to DB : " . mysqli_connect_error());

    function getData($sql){
        global $connection ;
        $nomor=1;
        $sql = "SELECT * FROM input_permohonan";
        $query = mysqli_query($connection, $sql) or die ("Can't get Data from DB , check your SQL Query " );
        $data = array();

        while($result = mysqli_fetch_assoc($query)):
            $dat = array_merge(array("no" => $nomor++), $result);
            $data[] = $dat;
            
        endwhile;

        return $data;
    }


    $draw = $_POST["draw"];
    $orderByColumnIndex  = $_POST['order'][0]['column'];
    $orderBy = $_POST['columns'][$orderByColumnIndex]['data'];
    $orderType = $_POST['order'][0]['dir']; 
    $start  = $_POST["start"];
    $length = $_POST['length'];


    $recordsTotal = count(getData("SELECT * FROM ".MyTable));

    /* SEARCH */
    if(!empty($_POST['search']['value'])){

        /* WHERE  */
        for($i=0 ; $i<count($_POST['columns']);$i++){
            $column = $_POST['columns'][$i]['data'];
            $where[]="$column like '%".$_POST['search']['value']."%'";
        }
        $where = "WHERE ".implode(" OR " , $where);

        $sql = sprintf("SELECT * FROM %s %s", MyTable , $where);

        $recordsFiltered = count(getData($sql));

        
        $sql = sprintf("SELECT * FROM %s %s ORDER BY %s %s limit %d , %d ", MyTable , $where ,$orderBy, $orderType ,$start,$length  );
        $data = getData($sql);
    }
    /* END SEARCH */
    else {
        $sql = sprintf("SELECT * FROM %s ORDER BY %s %s limit %d , %d ", MyTable ,$orderBy,$orderType ,$start , $length);
        $data = getData($sql);

        $recordsFiltered = $recordsTotal;
    }

    $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $recordsTotal,
        "recordsFiltered" => $recordsFiltered,
        "data" => $data
    );

    echo json_encode($response);


?>