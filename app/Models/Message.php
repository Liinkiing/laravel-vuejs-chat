<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \App\Models\Message create($attributes = array())
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereUpdatedAt($value)
 * @property string $body
 * @property int $author_id
 * @property-read \App\User $author
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereBody($value)
 */
class Message extends Model
{

    protected $with = ['author'];
    protected $fillable = ['body', 'author_id'];

    public function author() {
        return $this->belongsTo(User::class);
    }
}
