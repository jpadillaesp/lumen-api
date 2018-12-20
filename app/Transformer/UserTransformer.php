<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Transformer;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    function transform(User $user) {

        return [
            'id' => $user->id,
            'email' => $user->email,
            'confirmed' => $user->confirmed,
            'blacklisted' => $user->blacklisted,
            'optedin' => $user->optedin,
            'bouncecount' => $user->bouncecount,
            'entered' => $user->entered,
            'modified' => $user->modified,
            'uniqid' => $user->uniqid,
            'uuid' => $user->uuid,
            'htmlemail' => $user->htmlemail,
            'subscribepage' => $user->subscribepage,
            'rssfrequency' => $user->rssfrequency,
            'password' => $user->password,
            'passwordchanged' => $user->passwordchanged,
            'disabled' => $user->disabled,
            'extradata' => $user->extradata,
            'foreignkey' => $user->foreignkey
        ];
    }

}
