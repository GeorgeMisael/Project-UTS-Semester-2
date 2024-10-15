<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageKategori extends Model
{
    use HasFactory;

    protected $table = 'message_kategoris';

    protected $fillable = [
        'no_mk', 'description', 'create_by',
        'delete_mark', 'update_by'
    ];

    // Relationship with Message
    public function messages()
    {
        return $this->hasMany(Message::class, 'no_mk', 'no_mk');
    }
}
