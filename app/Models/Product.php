<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'client_id',
        'product_name',
        'product_description',
        'product_image',
        'product_name_en',
        'product_description_en',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'id', 'id');
    }
}
