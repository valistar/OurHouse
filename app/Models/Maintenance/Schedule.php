<?php

namespace OurHouse\Models\Maintenance;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * Defines a schedule of maintenance (generally recurring) tasks associated with property
 *
 * @package OurHouse\Models\Maintenance
 * @property \OurHouse\Models\Property property
 * @property \Illuminate\Database\Eloquent\Collection|RecurringTask[] recurringTasks
 */
class Schedule extends Model
{

    public function property()
    {
        return $this->belongsTo('OurHouse\Models\Property');
    }

    public function recurringTasks()
    {
        return $this->hasMany('OurHouse\Models\Maintenance\RecurringTask');
    }
}