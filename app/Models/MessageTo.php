<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MessageTo extends Model
{
    use HasFactory;

    protected $table = 'message_tos';

    protected $fillable = [
        'no_record', 'message_id', 'to', 'cc',
        'create_by', 'delete_mark', 'update_by'
    ];


    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the message_id when creating a new message
        static::creating(function ($messageto) {
            if (empty($messageto->no_record)) {
                $messageto->no_record = (string) Str::uuid(); // Generate a UUID
            }
        });
    }
    // Relationship with Message
    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id', 'message_id');
    }
}
