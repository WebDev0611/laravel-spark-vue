<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    // public $fillable = [
    //     'title',
    //     'multiplier',
    //     'value',
    //     'type_id'

    // ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'json' => 'array'
    ];

    public function quoteID() {
        return array_get($this->data, 'id', []);
    }
    public function getQuoteTitle() {
        return array_get($this->title, 'title', []);
    }
}
