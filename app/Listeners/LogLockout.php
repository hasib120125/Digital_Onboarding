<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class LogLockout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Lockout  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        $user = User::where('username', $event->request->username)->first();
        $user->is_locked = true;
        $user->save();
        activity('session')
            ->by($user)
            ->on($user)
            ->log('locked-out');
    }
}
