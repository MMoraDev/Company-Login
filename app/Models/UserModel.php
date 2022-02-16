<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = [ 'User_ID', 'Person_FK', 'Username', 'Password' ];
}