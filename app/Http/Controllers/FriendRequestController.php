<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\User;

class FriendRequestController extends Controller
{

    public function list()
    {
        // lists the friend requests of a user
    }

    public function create()
    {
        // creates a new friend request
    }

    public function update()
    {
        // updates the status of a friend requests (accept/decline)
    }

    public function delete()
    {
        // delete a friend request (the sender cancels the request)
    }
}
