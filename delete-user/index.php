<?php

include("../global.php");

if(isset($_POST['user_id'])) {

    $query1 = "DELETE FROM Users WHERE id = {$_POST['user_id']}";
    $query2 = "DELETE FROM Hobbies_X_Users WHERE idUser = {$_POST['user_id']}";

    if(mysqli_query($mysqli, $query1) && mysqli_query($mysqli, $query2)) {
        
        $result['status'] = 'Remoção de user bem-sucedida';

    } else {
        $result['error'] = 'Erro desconhecido';
    }

} else {
    $result['error'] = 'Argumento faltando';
}

echo json_encode($result);

?>