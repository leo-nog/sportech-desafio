<?php

include("../global.php");

$get_users_query = mysqli_query($mysqli, "SELECT * FROM Users WHERE name LIKE '{$_GET['name']}%' LIMIT 50");

$num = 0;

while($user = mysqli_fetch_array($get_users_query)) {

    $original_creation_date     = strtotime($user['created_at']); 
    $new_format                 = date("d/m/Y", $original_creation_date);
    $current_date               = date("Y-m-d");
    $age                        = date_diff(date_create($user['birthDate']), date_create($currentDate));

    $result[$num]['id']         = $user['id'];
    $result[$num]['name']       = $user['name'];
    $result[$num]['country']    = $user['country'];
    $result[$num]['age']        = $age->format("%y");
    $result[$num]['created_at'] = $new_format;


    $hobbies_query = mysqli_query($mysqli, "SELECT * FROM Hobbies as L1
                                            INNER JOIN (
                                                SELECT * FROM Hobbies_X_Users WHERE idUser = {$user['id']}
                                            ) as L2
                                            ON L1.id = L2.idHobby 
                                            ORDER BY L1.id ASC
                                            LIMIT 50");

    $num_hobby = 0;

    while($hobby = mysqli_fetch_array($hobbies_query)) {
        $result[$num]['hobbies'][$num_hobby] = $hobby['hobbie'];
        $num_hobby++;
    }

    $num++;
}

echo json_encode($result);

?>