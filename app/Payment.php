<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @package App
 * @property string $email
 * @property string $merchant
 * @property double $amount
*/
class Payment extends Model
{
    protected $fillable = ['email', 'merchant', 'amount'];
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        if ($input != '') {
            $this->attributes['amount'] = $input;
        } else {
            $this->attributes['amount'] = null;
        }
    }
    
}
