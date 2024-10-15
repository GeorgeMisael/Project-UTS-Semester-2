<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageDokumen extends Model
{
    use HasFactory;

    protected $table = 'message_dokumens';

    protected $fillable = [
        'no_mdok',
        'file',
        'description',
        'message_id',
        'create_by',
        'delete_mark',
        'update_by'
    ];

    // Relationship with Message
    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id', 'message_id');
    }
}
