<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    //
    protected $table = 'clients';
    protected $primaryKey = 'client_id';

    protected $fillable = [
        'client_name',
        'client_email',
        'client_password',
        'client_logo',
        'client_feature',
        'client_name_en',
        'client_feature_en',
    ];

    protected $hidden = [
        'client_password',
    ];

     public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'client_id', 'client_id');
    }

}
