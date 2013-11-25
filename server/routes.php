<?php
require_once 'controllers/UserImpl.php';

//SET INDEX PAGE
$app->get('/', function(){
    echo json_encode(array(
        'status' => 'OK',
        'http_code' => '200',
        'message' => 'Chatout API is healthy'
    ));
});

/*--------------------------------*/
/*--------- USER ROUTES ----------*/
/*--------------------------------*/
$user_controller = new UserImpl;
// find all users
$app->get('/users',function() use ($user_controller) {
    $user_controller->findAll();
});
//find an user by name
$app->get('/user/:name', function($name) use ($user_controller) {
    $user_controller->findUser($name);
});
//update an user
$app->post('/user', function() use ($user_controller) {
    $user_controller->updateUser();
});


