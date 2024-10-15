<?php

// In App\Models\Message.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $primaryKey = 'message_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'message_id',
        'sender',
        'message_reference',
        'subject',
        'message_text',
        'message_status',
        'no_mk',
        'create_by',
        'delete_mark',
        'update_by'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->message_id = Str::uuid()->toString();
        });
    }

    // In App\Models\Message.php
    public function recipients()
    {
        return $this->hasMany(MessageTo::class, 'message_id', 'message_id');
    }

    public function senderMessages()
    {
        return $this->hasMany(MessageTo::class, 'to', 'sender');
    }

    // Relationship with MessageKategori
    public function category()
    {
        return $this->belongsTo(MessageKategori::class, 'no_mk', 'no_mk');
    }

    // Relationship with MessageDokumen
    public function documents()
    {
        return $this->hasMany(MessageDokumen::class, 'message_id', 'message_id');
    }
}
