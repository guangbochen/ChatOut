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
//create an user
$app->post('/add/user', function() use ($user_controller) {
    $user_controller->createUser();
});
//delete an user
$app->post('/delete/user', function() use ($user_controller) {
    $user_controller->deleteUser();
});

