<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'name',
    'code',
    'phone',
    'email',
    'address',
    'city',
    'status',
    'description',
])]
class Branch extends Model
{
    use SoftDeletes;

    /**
     * Relationships
     */

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    /**
     * Scopes
     */

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    /**
     * Business Methods
     */

    public function activate(): bool
    {
        return $this->update([
            'status' => 'active',
        ]);
    }

    public function deactivate(): bool
    {
        return $this->update([
            'status' => 'inactive',
        ]);
    }

    /**
     * Helpers
     */

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isInactive(): bool
    {
        return $this->status === 'inactive';
    }
}
