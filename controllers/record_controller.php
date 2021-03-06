<?php
include_once 'middleware/auth.php';

if(isset($_POST['submit']))
{
    $user_id = $db->selectValue('id', 'users', 'username', $_SESSION['username']);

    $record = array(
        'user_id'=>$user_id,
        'civ'=>$_POST['civ'],
        'birth'=>$_POST['birth'],
        'first_name'=>$_POST['fname'],
        'last_name'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'phone'=>$_POST['phone'],
        'comment'=>$_POST['comment']
    );

    $db->insertRow('records', ':user_id, :civ, :birth, :first_name, :last_name, :address, :phone, :comment', $record);
    $db->updateValue('users', 'is_patient', '1', 'id', $user_id);

    alert("Form completed !", "green");
}
