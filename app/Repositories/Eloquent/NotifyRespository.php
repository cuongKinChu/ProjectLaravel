<?php

namespace App\Repositories\Eloquent;

use App\Models\Notify;
use App\Repositories\NotifyRespositoryInterface;

class NotifyRespository extends BaseRepository implements NotifyRespositoryInterface
{
    public function __construct(Notify $notify)
    {
        parent::__construct($notify);
    }
}