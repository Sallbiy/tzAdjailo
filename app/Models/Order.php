<?php


namespace App\Models;

use App\Models\OrderMessage;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $title
 * @property string $message
 * @property string|null $file
 * @property string $status
 * @property int $is_read
 * @property int $has_answer
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
**/
class Order extends Model
{
    public const STATUS_NEW = 'Новый';
    public const STATUS_APPROVED = 'Утверждено';
    public const STATUS_CLOSED = 'Закрыто';
    public const IS_READ_TRUE = 1; // Просмотрено
    public const IS_READ_FALSE = 0; // Не просмотрено
    public const ANSWER_TRUE = 1; //Отвечено
    protected $fillable = [
            'title',
            'message',
            'file',
            'status',
            'is_read',
            'has_answer',
            'user_id',
        ];


    public function messages()
    {
        return $this->hasMany(OrderMessage::class)->orderByDesc('created_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isNew()
    {
        return $this->status === static::STATUS_NEW;
    }

    public function isApproved()
    {
        return $this->status === static::STATUS_APPROVED;
    }

    public function isClosed()
    {
        return $this->status === static::STATUS_CLOSED;
    }

//    public function isRead()
//    {
//        return $this->is_read === static::IS_READ_FALSE;
//    }

}
