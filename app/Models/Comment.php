<?php

namespace App\Models;

use App\System\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comments
 * @package App\Models
 * @property int id
 * @property string title
 * @property string text
 * @property int user_id
 * @property int article_id
 */
class Comment extends Model
{
    /**
     * Добавляет связь с пользователем
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}