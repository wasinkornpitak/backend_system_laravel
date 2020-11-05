<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    protected $table = 'ques';
    protected $primaryKey = 'ques_id';

    public function FaqsDetail()
    {
        return $this->hasMany('\App\FaqsDetail', 'ques_id', 'ques_id');
    }
}
