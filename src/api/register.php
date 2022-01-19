<?php

require_once "users.php";

/*
0: {name: 'uname', value: ''}
1: {name: 'email', value: 'nick@mail.com'}
2: {name: 'pwd', value: ''}
3: {name: 'pwd_dup', value: ''}
4: {name: 'fname', value: 'Niko'}
5: {name: 'surname', value: 'Snia'}
6: {name: 'fathersName', value: 'Siko'}
7: {name: 'mothersName', value: 'Asd'}
8: {name: 'birthDate-day', value: '1'}
9: {name: 'birthDate-month', value: '1'}
10: {name: 'birthDate-year', value: '1900'}
11: {name: 'docSelection', value: '0'}
12: {name: 'docID', value: 'AM123456'}
13: {name: 'country', value: '1'}
14: {name: 'city', value: 'adasdas'}
15: {name: 'address', value: 'wrewer 12'}
16: {name: 'mobilePhone', value: '3742984735'}
17: {name: 'homePhone', value: '29873457'}
*/

$data = $_POST;

if (newUser($data['uname'], $data['pwd'], $data['email'],
            $data['fname'], $data['surname'], $data['mothersName'], $data['fathersName'],
            $data['country'], $data['city'], $data['address'],
            $data['docSelection'], $data['docID'], $data['gender'],
            $data['birthDate-year'].'-'.$data['birthDate-month'].'-'.$data['birthDate-day'],
            $data['mobilePhone'], $data['homePhone'], 0) == true){
    echo 'success';
}else{
    echo $db_error_message;
}