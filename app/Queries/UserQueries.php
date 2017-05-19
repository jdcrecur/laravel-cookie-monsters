<?php
namespace App\Queries;

use DB, Hash, Log, Auth;
use App\Models\User as User;

class UserQueries
{

    /**
     * The instance of the user model
     * @var User
     */
    protected $User;
    protected $RoleQueries;
    function __construct(User $User)
    {
        $this->User = $User;
    }

    /**
     * @param $email
     * @return User
     */
    function getOneByEmail( $email )
    {
        return $this->User
            ->where('email', $email )
            ->first();
    }


}