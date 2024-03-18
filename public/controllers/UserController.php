<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserController
 *
 * @author lmatejovsky
 */
class UserController {
    public function show($userId) {
        //Načtěte data uživatele z databáze nebo jiného zdroje
        $user = UserModel::find($userId);
        
        //User View
        require '../Views/show.php';
    }
}
