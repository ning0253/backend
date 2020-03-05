<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $news_id
 * @property string $img
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class NewsImg extends Model
{
    protected $table = 'news_imgs';
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['news_id', 'img', 'sort', 'created_at', 'updated_at'];

}
