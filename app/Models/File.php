<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasCreatorAndUpdater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class File extends Model
{
    use HasCreatorAndUpdater,
        HasFactory,
        NodeTrait,
        SoftDeletes;

    protected $casts = [
        'is_folder' => 'boolean',
    ];

    public function isOwnedBy(int $userId): bool
    {
        return $this->created_by === $userId;
    }
}
