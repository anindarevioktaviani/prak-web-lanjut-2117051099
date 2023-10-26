<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;
class UserController extends BaseController
{
    
    
        
    
    public function create() {
        return view ('create_user');
    }
}
