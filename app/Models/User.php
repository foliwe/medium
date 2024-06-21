<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class UserSlugService
{
    public static function createSlug($model, $attribute)
    {
        // Generate the base slug from the attribute
        $slug = Str::slug($model->$attribute);

        // Append random characters
        $code = "@";


        // Return the final slug
        return "{$code}{$slug}";
    }
}

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasFactory, Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    public function blogs(): HasMany
    {

        return $this->hasMany(Blog::class);
    }


    public function likedBlogs(): BelongsToMany
    {
         return $this->belongsToMany(Blog::class, 'blog_like')->withTimestamps();
    }

    public function sluggable(): array
    {
        return [
        'slug' => [
        'source' => 'name',
                ]
            ];

    }








}