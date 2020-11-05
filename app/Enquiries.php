<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    protected $table = 'enquiry';
    protected $primaryKey = 'enquiry_id';

    public function EnquiriesData()
    {
        return $this->hasMany('\App\EnquiriesData', 'enquiry_id', 'enquiry_id');
    }

    public function EnquiriesComment()
    {
        return $this->hasMany('\App\EnquiriesComment', 'enquiry_id', 'enquiry_id')->orderBy('created_at', 'DESC')->take(1);
    }
}
