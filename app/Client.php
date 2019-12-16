<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function getHoursAttribute() {
        return $this->tasks->sum('minutes') / 60;
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
