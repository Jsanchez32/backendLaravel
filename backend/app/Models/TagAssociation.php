<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagAssociation extends Model
{
    // Relación con tags
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'nivel1');
    }
}
