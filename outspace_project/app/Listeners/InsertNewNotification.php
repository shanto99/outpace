<?php

namespace App\Listeners;

use App\Events\NewNotification;
use App\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class InsertNewNotification
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
     * @param  NewNotification  $event
     * @return void
     */
    public function handle(NewNotification $event)
    {
        $type = $event->type;
        $doc_id = $event->doc_id;
        $part = $event->part;
        $description = "New ".$type." Inserted";
        $insertion_time = date("Y/m/d");
        DB::table('notifications')->insert(['type'=>$type, 'doc_id'=>$doc_id, 'part'=>$part, 'description'=>$description,'insertion_time'=>$insertion_time]);

    }
}
