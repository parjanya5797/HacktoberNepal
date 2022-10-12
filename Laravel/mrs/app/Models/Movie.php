<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model implements Viewable
{
    use InteractsWithViews;
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['embeded_trailer', 'embeded_source'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie')->withTimestamps();
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


    public function getEmbededTrailerAttribute()
    {
        if (isset($this->trailer)) {
            return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", '<iframe class="embed-responsive-item" width="100%" height="550px" src="//www.youtube.com/embed/$1" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>', $this->trailer);
        }
    }
    public function getEmbededSourceAttribute()
    {
        if (isset($this->source)) {
            return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", '<iframe class="embed-responsive-item" width="100%" height="550px" src="//www.youtube.com/embed/$1" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>', $this->source);
        }
    }

    // Accessors
    public function getQualityAttribute($attribute)
    {
        return $attribute <= 2 ? [
            1 => 'HD',
            2 => 'CAM'
        ][$attribute] : null;
    }

    public function getImageAttribute($attribute)
    {
        if (isset($attribute)) {
            if (file_exists(public_path('storage/' . $attribute))) {
                return asset('storage/' . $attribute);
            } else {
                return $attribute;
            }
        } else {
            return 'https://via.placeholder.com/300x400';
        }
    }

    public function getReleaseDateAttribute($attribute)
    {
        return !is_null($attribute) ? Carbon::create($attribute)->toFormatteddatestring() : null;
    }

    public function isLikedByUser($user_id)
    {
        return $this->favorites()->where('user_id', $user_id)->exists();
    }
}
