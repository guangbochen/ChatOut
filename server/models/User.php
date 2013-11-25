<?php
// define database shcema
use RedBean_Facade as R;

//speed up the process of recursive query like exportAll and dup
/* $schema = R::$duplicationManager->getSchema(); */
/* R::$duplicationManager->setTables($schema); */

/**
 * this class manages bsaic CRUD method of the users
 **/
Class User {
    private $name;
    private $password;
    private $role;


    /* returns all users */
    public static function findAll() {
        $users = R::findAll('users'); 

        //return array of users if is found
        if($users) return R::exportAll($users);

        return null;
    }
    
    /* find an user by name */
    public static function findUser($name) {
        $user = R::findOne('users','name = ?', array($name));

        //return user if is found
        if($user) return json_decode($user);

        return null;
    }

    /* update an user */
    public static function updateUser($input) {
        R::begin();
        try
        {
            $user = R::findOne('users','id = ?', array($input['id']));
            $user->name = $input['name'];
            $user->password = $input['password'];
            R::store($user);
            R::commit();
        }
        catch(Exception $e) {
            R::rollback();
        }
    }

    public static function validateLogin($name, $password)
    {
        $user = R::findOne('users','name = ?', array($name));
        if(!$user) return false;
        if(strcmp($user->password, $password) == 0) return true;
        return false;
    }

}


