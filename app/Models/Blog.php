<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasRichText;

    protected $guarded = [];

    protected $richTextAttributes = [
        'content',
        'notes',
    ];
}


class CustomSlugService
{
    public static function createSlug($model, $attribute)
    {
        // Generate the base slug from the attribute
        $slug = Str::slug($model->$attribute);

        // Append random characters
        $randomString = substr(bin2hex(random_bytes(5)), 0, 12);
        $date = Carbon::now()->format('Ymdhis');

        // Return the final slug
        return "{$slug}-{$randomString}@{$date}";
    }
}

class Blog extends Model
{
    const EXCERPT_LENGTH = 100;
    const SIDE_TITLE = 50;
    const EXCERPT_WORD = 13;
    const TITLE_LENGTH = 4;
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'content',
        'photo',
        'excerpt'



];



public function intro()
    {
     return Str::limit($this->excerpt, Blog::EXCERPT_LENGTH);
    }

    public function side_excerpt()
    {
    return Str::words($this->excerpt, Blog::EXCERPT_WORD);
    }

    public function side_title()
    {
    return Str::limit($this->title, Blog::SIDE_TITLE);
    }

public function short_title()
    {
        return Str::words($this->title, Blog::TITLE_LENGTH);
    }

    public function sluggable(): array
    {
    return [
    'slug' => [
        'source' => 'title',
        'method' => function ($model, $attribute) {
        // Use the custom slug service to generate the slug
        return CustomSlugService::createSlug($this, 'title');
        }
    ]
    ];

    }

    public static function popular()
    {
    return self::with(['user'])->withCount('likes')
    ->orderBy('likes_count', 'desc')
    ->limit(3)
    ->get();
    }


    public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

    public function comments(): HasMany

        {
            return $this->hasMany(Comment::class)->latest();
        }

        public function likes(): BelongsToMany
            {
                return $this->belongsToMany(User::class, 'blog_like')->withTimestamps();
            }

}