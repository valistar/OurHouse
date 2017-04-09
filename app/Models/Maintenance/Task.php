<?php

namespace OurHouse\Models\Maintenance;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @package OurHouse\Models\Maintenance
 */
class Task extends Model
{

    public function property()
    {
        return $this->belongsTo('OurHouse\Models\Property');
    }

    public function template()
    {
        return $this->belongsTo('OurHouse\Models\Maintenance\RecurringTask');
    }

    public function expense()
    {
        return $this->hasOne('OurHouse\Models\Expense');
    }

}