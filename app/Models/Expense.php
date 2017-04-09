<?php

namespace OurHouse\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Expense
 *
 * @package OurHouse\Models
 * @property string name
 * @property string description
 * @property float amount
 * @property Property property
 * @property \OurHouse\Models\Maintenance\Task sourceTask
 */
class Expense extends Model
{

    public function property()
    {
        return $this->belongsTo('OurHouse\Models\Property');
    }

    public function sourceTask()
    {
        return $this->belongsTo('OurHouse\Models\Maintenance\Task', 'task_id');
    }

}