<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /* To find the Task based on a attribute(column in table), by default it is ID attribute */
    /* public function getRouteKeyName()
    {
        return 'title';
    } */

    protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}
