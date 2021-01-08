<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
//
// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return true;
// });
Broadcast::channel('messages.{id}', function ($user, $id) {
//    print_r($user);
//    print_r($id);
    return $user->id === (int) $id;
});

