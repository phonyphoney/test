<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Employee; 
use Session;
class SetAuth
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
     * @param  AppListenersLogSuccessfulLogin  $event
     * @return void
     */
    public function handle(Login  $event)
    {           
        $employee = Employee::where('fk_user_id',Auth()->user()->id)->first();
        $role = $employee->role == "a" ? 1:2;
        Session::put("role",$role);
        
    }
}
