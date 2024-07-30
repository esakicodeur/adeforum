<?php

namespace App\Models;

use App\Models\ReplyAble;
use App\Traits\HasAuthor;
use App\Traits\HasLikes;
use App\Traits\HasTimesTamps;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

final class Reply extends Model
{
    use HasLikes;
    use HasAuthor;
    use HasFactory;
    use HasTimesTamps;
    use ModelHelpers;

    const TABLE = 'replies';

    protected $table = self::TABLE;

    protected $fillable = [
        'body',
    ];

    protected $with = [
        'likesRelation',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 200): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function to(ReplyAble $replyAble)
    {
        return $this->replyAbleRelation()->associate($replyAble);
    }

    public function replyAble(): ReplyAble
    {
        return $this->replyAbleRelation;
    }

    public function replyAbleRelation(): MorphTo
    {
        return $this->morphTo('replyAbleRelation', 'replyable_type', 'replyable_id');
    }
}
