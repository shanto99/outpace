<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LC extends Model
{
    protected $table = 'letter_of_credit';
    public function issuing_bank(){
       return $this->belongsTo('App\Bank','issuing_bank_id','bank_id');
    }
    public function beneficiary_bank(){
        return $this->belongsTo('App\Bank','beneficiary_bank_id','bank_id');
    }
    public function document_submitted_bank(){
        return $this->belongsTo('App\Bank','document_submit_bank_id','bank_id');
    }
    public function buyer(){
        return $this->belongsTo('App\Buyer','buyer_id','buyer_id');
    }
    public function negotiating_bank(){
        return $this->belongsTo('App\Bank','negotiating_bank_id','bank_id');
    }
}
