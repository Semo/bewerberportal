<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     *
     */
    protected $table = "applicants";

    protected $guarded = [];

    // protected $fillable = ['user_id'];

    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];
}
