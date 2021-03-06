<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    // 有了以上的关联设定，后面开发中我们可以很方便地通过 $topic->category、$topic->user 来获取到话题对应的分类和作者。

    // 一个话题对应一个分类：一对一的关系 使用 belongsTo()
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 一个话题拥有一个作者
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // scope 本地作用域
    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query = $this->recent();
                break;
            default:
                $query = $this->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        return $query->with('user', 'category');
    }

    public function scopeRecentReplied($query)
    {
        // 当话题有新的回复时，我们将编写逻辑来更新话题模型的 reply_count 属性
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('created_at', 'desc');
    }
}
