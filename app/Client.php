<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function getHoursAttribute() {
        $hours = $this->tasks->sum('minutes') / 60;
        return number_format($hours, 2);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
