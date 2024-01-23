<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $creator
 * @property string $executor
 * @property string $name
 * @property string $description
 * @property string $status
 */
class Task extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $fillable = [
        'creator',
        'executor',
        'name',
        'description',
        'status'
    ];
}
