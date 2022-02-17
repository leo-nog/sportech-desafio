<?php

include("../global.php");

if(isset($_POST['name']) && isset($_POST['birthDate']) && isset($_POST['country'])) {

    $created_at = date("Y-m-d H:i:s");

    $query1 = "INSERT INTO Users (name, birthDate, country, created_at) VALUES ('{$_POST['name']}','{$_POST['birthDate']}','{$_POST['country']}','$created_at')";

    if(mysqli_query($mysqli, $query1)) {

        $user_id = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id FROM Users ORDER BY id DESC LIMIT 1"));
        $user_id = $user_id['id'];
        
        $result['status'] = "Adição de user ($user_id) bem-sucedida";

    } else {
        $result['error'] = 'Erro desconhecido';
    }

} else {
    $result['error'] = 'Argumento faltando';
}

echo json_encode($result);

?>