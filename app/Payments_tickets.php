<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments_tickets extends Model
{
    protected $fillable = ['payment_id', 'ticket_id', 'tickets_amount'];
    public $timestamps = false;

    public function payment()
    {
        return $this->belongsToMany('App\Payments')->withTrashed();
    }

    public function ticket()
    {
        return $this->belongsToMany('App\Tickets')->withTrashed();
    }
}
