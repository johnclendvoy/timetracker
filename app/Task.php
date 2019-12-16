<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $dates = ['date'];

    public function getHoursMinutesAttribute() {
        $hoursMinutes = '';
        $h = floor($this->minutes / 60);
        $m = $this->minutes % 60;
        if($h > 0) {
            $hoursMinutes .= $h . 'h ';
        }
        if($m > 0) {
            $hoursMinutes .= $m . 'm';
        }
        return $hoursMinutes;
    }

}
