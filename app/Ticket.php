<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ticket
 *
 * @package App
 * @property string $event
 * @property string $title
 * @property integer $amount
 * @property string $available_from
 * @property string $available_to
 * @property double $price
*/
class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'amount', 'available_from', 'available_to', 'price', 'event_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setEventIdAttribute($input)
    {
        $this->attributes['event_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        $this->attributes['amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAvailableFromAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['available_from'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['available_from'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getAvailableFromAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAvailableToAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['available_to'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['available_to'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getAvailableToAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price'] = $input;
        } else {
            $this->attributes['price'] = null;
        }
    }
    
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id')->withTrashed();
    }
    
}
