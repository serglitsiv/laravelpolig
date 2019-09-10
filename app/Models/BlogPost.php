<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    /**
     * категория статьи.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        // статья принадлежит категории
        return $this->belongsTo(BlogCategory::class);

    }

    /**
     * автор статьи.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        // статья принадлежит пользователю
        return $this->belongsTo(User::class);

    }



}
