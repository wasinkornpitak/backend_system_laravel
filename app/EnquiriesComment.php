<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiriesComment extends Model
{
    protected $table = 'enquiry_comment';
    protected $primaryKey = 'enquiry_comment_id';

    public function AdminUser(){
        return $this->hasOne('\App\AdminUser', 'admin_id', 'admin_id');
    }
}
