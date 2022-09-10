<?php 


function validate_data($conn,$data){
    $data = trim($data);
    $data = mysqli_real_escape_string($conn,$data);
    $data = htmlentities($data);
    return $data;
}

function validate_post($conn,$data){
    $data = trim($data);
    $data = mysqli_real_escape_string($conn,$data);
    return $data;
}

// SEO FRIENDLY URL SLUG FUNCTION

function slug($text){
    $text = preg_replace('~[^\\pL\d]+~u','-',$text);
    $text = trim($text,'-');
    $text = iconv('utf-8','us-ascii//TRANSLIT',$text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~','',$text);
    if(empty($text)){
        return 'n-a';
    }else{
        return $text;
    }
}

// dynamic sql insert query
  function insert($conn,$table,$data){
      $collumns = array_keys($data);
      $values = array_values($data);
      $query = "INSERT INTO $table(".implode(', ', $collumns) .")" ." ". "VALUES(".implode(",", $values). ")";
      $insertQuery = mysqli_query($conn,$query) or die("Insert Data query failed");
      return $insertQuery;
  }


  // dynamic sql update query
  function update($conn,$table,$data,$where,$nameCond,$where2="",$nameCond2=""){
    $cols = array();
    foreach($data as $key => $val){
        $cols[] = "$key = $val";
    }
    
    $query = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where = $nameCond";
    if(!empty($where2)){
        $query .= " AND  $where2 = $nameCond2";
    }
    $updateQuery = mysqli_query($conn,$query) or die("Update data query failed");
    return $updateQuery;
    
}


  // dynamic sql delete query
  function delete($conn,$table,$where,$nameCond){
    $query = "DELETE FROM $table WHERE $where = $nameCond";
    $deleteQuery = mysqli_query($conn,$query) or die("Delete data query failed");
    return $deleteQuery;
    
}

  // dynamic sql select query
  function select($conn,$table1,$table2="",$col1="",$col2="",$order="",$where="",$nameCond="",$offset="",$limit=""){

    $query = "SELECT * FROM $table1";
    if(!empty($table2)){
        $query .= " JOIN $table2 ON $table1.$col1 = $table2.$col2";
    }
    if(!empty($where)){
        $query .= " WHERE $where = $nameCond";
    }
    if(!empty($order)){
        $query .= " ORDER BY $order DESC";
    }
    if(!empty($offset)){
        $query .= " LIMIT $offset , $limit";
    }
    $selectQuery = mysqli_query($conn,$query) or die("Select data query failed");
    return $selectQuery;
    
}

// dynamic alert massage

function customassage($session="",$alert="",$msg="",$baseUrl="",$file=""){
    function massages($alert="",$msg=""){
        if(!empty($msg)){
            $massage = "<span class='$alert'>$msg</span>";
            return $massage;
        }
    }
    $_SESSION[$session] = massages($alert,$msg);

    function location($baseUrl="",$file=""){
        if(!empty($baseUrl)){
            header("location:$baseUrl/$file");
            die();
        }
    }
    location($baseUrl,$file);
}

?>