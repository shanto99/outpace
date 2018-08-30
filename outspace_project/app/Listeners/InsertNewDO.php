<?php

namespace App\Listeners;

use App\DeliveryOrder;
use App\Events\NewDO;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use App\Events\NewNotification;

class InsertNewDO
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
     * @param  NewDO  $event
     * @return void
     */
    public function handle(NewDO $event)
    {
        $lc_id = $event->lc_id;
        $lc_ammendment_no = $event->lc_ammendment_no;
        $do_serial = DeliveryOrder::where('order_no', 'LIKE', '%OSLM/DO/'.substr(date('Y'),-2).'%')->count()+1;
        $do_id = "OSLM/DO/".substr(date('Y'),-2)."/".$do_serial;
        $do = new DeliveryOrder();
        $do->order_no = $do_id;
        $do->do_date = date('Y-m-d');
        $do->lc_id = $lc_id;
        $do->lc_ammend_no = $lc_ammendment_no;
        $do->do_finally_approve = Auth::user()->id;
        $do->save();
        Event::fire(new NewNotification('DO',$do_id,0));
    }
}
