<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'new_enquiry' => 'New Enquiry',
        'contacted'   => 'Contacted',
    ];

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'message',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
