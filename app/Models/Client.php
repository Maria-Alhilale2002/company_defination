<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clients';

    protected $primaryKey = 'client_id';

    public $timestamps = true;

    protected $fillable = [
        'client_name',
        'client_email',
        'client_password',
        'role',
        'is_active',
        'client_logo',
        'is_featured',
        'client_name_en',
    ];

    protected $hidden = [
        'client_password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    // مهم جداً لأن اسم العمود ليس password
    public function getAuthPassword()
    {
        return $this->client_password;
    }

    // تحديد اسم عمود كلمة المرور للمصادقة
    public function getAuthPasswordName(): string
    {
        return 'client_password';
    }

    // تحديد اسم المفتاح المستخدم في credentials
    public function getAuthIdentifierName(): string
    {
        return 'client_email';
    }

    // دوال مساعدة
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isFeatured(): bool
    {
        return $this->is_featured;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'client_id', 'client_id');
    }
}
