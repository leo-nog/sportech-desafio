<?php

include("../global.php");

if(isset($_POST['user_id']) && isset($_POST['hobby'])) {

    $query1 = "INSERT INTO Hobbies (hobbie) VALUES ('{$_POST['hobby']}')";

    if(mysqli_query($mysqli, $query1)) {

        $hobby_id = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id FROM Hobbies ORDER BY id DESC LIMIT 1"));
        $hobby_id = $hobby_id['id'];

        mysqli_query($mysqli, "INSERT INTO Hobbies_X_Users (idUser, idHobby) VALUES ({$_POST['user_id']}, $hobby_id)");
        
        $result['status'] = 'Adição de hobby bem-sucedida';

    } else {
        $result['error'] = 'Erro desconhecido';
    }

} else {
    $result['error'] = 'Argumento faltando';
}

echo json_encode($result);

?>