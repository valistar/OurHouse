<?php

namespace OurHouse\Models\Maintenance;


use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecurringTask
 *
 * @package OurHouse\Models\Maintenance
 * @property string name
 * @property CarbonInterval frequency
 * @property Carbon next_at When this task next recurs
 * @property Schedule schedule
 * @property \Illuminate\Database\Eloquent\Collection|Task[] instances
 */
class RecurringTask extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'next_at'
    ];

    public function schedule()
    {
        return $this->belongsTo('OurHouse\Models\Maintenance\Schedule');
    }

    public function instances()
    {
        return $this->hasMany('OurHouse\Models\Maintenance\Task', 'template_id');
    }

    /**
     * Create a new model instance that is existing.
     * Used to convert CarbonInterval from db format - doing it on every single get/set is silly.
     * @param  array  $attributes
     * @param  string|null  $connection
     * @return static
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        $model = parent::newFromBuilder($attributes, $connection);
        if(isset($model->attributes['frequency'])) {
            $model->attributes['frequency'] = unserialize($model->attributes['frequency']);
        }

        return $model;
    }

}