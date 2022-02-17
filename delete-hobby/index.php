<?php

include("../global.php");

if(isset($_POST['hobby_id'])) {

    $query1 = "DELETE FROM Hobbies WHERE id = {$_POST['hobby_id']}";
    $query2 = "DELETE FROM Hobbies_X_Users WHERE idHobby = {$_POST['hobby_id']}";

    if(mysqli_query($mysqli, $query1) && mysqli_query($mysqli, $query2)) {
        
        $result['status'] = 'Remoção de hobby bem-sucedida';

    } else {
        $result['error'] = 'Erro desconhecido';
    }

} else {
    $result['error'] = 'Argumento faltando';
}

echo json_encode($result);

?>