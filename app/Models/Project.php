<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'title', 'description', 'slug', 'cover_image', 'git_link', 'project_link'];

    public function type(): BelongsTo
    {

        return $this->belongsTo(Type::class);
    }
}
