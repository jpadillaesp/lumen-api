<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;
use Illuminate\Support\Facades\Hash;
use App\User;

/**
 * Description of UsersRepository
 *
 * @author Root
 */
class UsersRepository {

    public function getUserAll() {
        $users = User::all();

        return $users;
    }

    public function getUserById($id) {
        $user = User::find($id);

        return $user;
    }

    public function setUser($input) {
        $user = new User();
        $user->email = $input['email'];
        $user->confirmed = $input['confirmed'];
        $user->blacklisted = $input['blacklisted'];
        $user->optedin = $input['optedin'];
        $user->bouncecount = $input['bouncecount'];
        $user->entered = $input['entered'];
        $user->modified = $input['modified'];
        $user->uniqid = $input['uniqid'];
        $user->uuid = $input['uuid'];
        $user->htmlemail = $input['htmlemail'];
        $user->subscribepage = $input['subscribepage'];
        $user->rssfrequency = $input['rssfrequency'];
        $user->password = Hash::make($input['password']);
        $user->passwordchanged = $input['passwordchanged'];
        $user->disabled = $input['disabled'];
        $user->extradata = $input['extradata'];
        $user->foreignkey = $input['foreignkey'];
        $user->save();
    }

    public function setUserById($input, $id) {
        $user = User::find($id);

        $user->email = $input['email'];
        $user->confirmed = $input['confirmed'];
        $user->blacklisted = $input['blacklisted'];
        $user->optedin = $input['optedin'];
        $user->bouncecount = $input['bouncecount'];
        $user->entered = $input['entered'];
        $user->modified = $input['modified'];
        $user->uniqid = $input['uniqid'];
        $user->uuid = $input['uuid'];
        $user->htmlemail = $input['htmlemail'];
        $user->subscribepage = $input['subscribepage'];
        $user->rssfrequency = $input['rssfrequency'];
        $user->password = Hash::make($input['password']);
        $user->passwordchanged = $input['passwordchanged'];
        $user->disabled = $input['disabled'];
        $user->extradata = $input['extradata'];
        $user->foreignkey = $input['foreignkey'];
        $user->save();
    }

    public function destroyUserById($id) {
        $user = User::find($id);
        $user->delete();
    }

}
