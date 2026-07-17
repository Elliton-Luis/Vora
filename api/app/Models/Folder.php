<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Folder extends Model
{

    protected $fillable = [
        'title',
        'color',
        'parent_folder_id',
        'user_id'
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Folder::class,'parent_folder_id');
    }

    public function subfolders(): HasMany
    {
        return $this->hasMany(Folder::class,'parent_folder_id');
    }
    
}
