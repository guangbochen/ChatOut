<?php
require_once 'helpers/json_helper.php';
require_once 'models/User.php';

class UserImpl {
    private $app;

    /* constructor */
    public function __construct() {
        $this->app = \Slim\Slim::getInstance();
    }

    /* returns all users */
    public function findAll() {
        try 
        {
            $users = User::findAll();
            if(!$users) throw new Exception ('empty users');

            //return finded users
            $users = array('users' => $users);
            response_json_data($users);
        }
        catch(Exception $e) 
        {
            response_json_error($this->app, 500, $e->getMessage());
        }
    }

    /* returns an user by name */
    public function findUser($name) {
        try 
        {
            $user = User::findUser($name);
            if(!$user) throw new Exception ('user not found');

            //retrun finded user
            $user = array('user' => $user);
            response_json_data($user);
        }
        catch(Exception $e) 
        {
            response_json_error($this->app, 500, $e->getMessage());
        }
    }

    /* update an user */
    public function updateUser() {
        $input = $this->app->request()->post();
        try 
        {
            if($input['name'] && $input['password']) 
            {
                User::updateUser($input);
                response_json_data('update user successfully');
            }
            else throw new Exception ('empty name or password');
        }
        catch(Exception $e) 
        {
            response_json_error($this->app, 500, $e->getMessage());
        }
    }
}



