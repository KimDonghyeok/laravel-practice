<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chirp extends Model
{
    use HasFactory;
    use SoftDeletes;    // not actually delete row from the DB, add "deleted_at" column to indicating time and date that which model was "deleted"

    protected $fillable = [
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
