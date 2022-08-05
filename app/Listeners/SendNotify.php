<?php

namespace App\Listeners;

use App\Events\OrderProcessed;
use App\Repositories\NotifyRespositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SendNotify
{
    private $notifyRespository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NotifyRespositoryInterface $notifyRespository)
    {
        //
        $this->notifyRespository = $notifyRespository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderProcessed  $event
     * @return void
     */
    public function handle(OrderProcessed $event)
    {
        $customer = $event->order;
        $array = [
            'customer_id' => $customer,
            'notification' => __('message.create', ['attribute' => 'order']),
        ];
        $this->notifyRespository->create($array);
    }
}
