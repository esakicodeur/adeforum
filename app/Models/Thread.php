<?php

namespace App\Models;

use App\Models\ReplyAble;
use App\Models\SubscriptionAble;
use App\Traits\HasAuthor;
use App\Traits\HasLikes;
use App\Traits\HasReplies;
use App\Traits\HasSubscriptions;
use App\Traits\HasTags;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Thread extends Model implements ReplyAble, SubscriptionAble, Viewable
{
    use HasTags;
    use HasLikes;
    use HasAuthor;
    use HasFactory;
    use HasReplies;
    use HasSubscriptions;
    use InteractsWithViews;

    const TABLE = 'threads';

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id',
        'author_id',
    ];

    protected $with = [
        'category',
        'tagsRelation',
        'likesRelation',
        'authorRelation',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function replyAbleSubject(): string
    {
        return $this->title();
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function delete()
    {
        $this->removeTags();
        parent::delete();
    }

    public function scopeForTag(Builder $query, string $tag): Builder
    {
        return $query->whereHas('tagsRelation', function ($query) use ($tag) {
            $query->where('tags.slug', $tag);
        });
    }

    public function isConversationOld(): bool
    {

    }
}
