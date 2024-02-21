<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Relación con tag_associations
    public function tagAssociations()
    {
        return $this->hasMany(TagAssociation::class, 'nivel1', 'id')
            ->orWhere('nivel2', $this->id)
            ->orWhere('nivel3', $this->id)
            ->orWhere('nivel4', $this->id);
    }
}
