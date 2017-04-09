<?php

namespace OurHouse\Models\Observers;


use OurHouse\Models\Maintenance\RecurringTask;

/**
 * Class RecurringTaskObserver
 * Store CarbonInterval serialized. This seems much nicer than doing the conversion on every single get/set, even
 * though we have to do it twice to keep the model functional after saving.
 *
 * @package OurHouse\Models\Observers
 */
class RecurringTaskObserver
{
    public function saving(RecurringTask $task)
    {
        if (isset($task->frequency)) {
            $task->frequency = serialize($task->frequency);
        }
    }

    public function saved(RecurringTask $task)
    {
        if (isset($task->frequency)) {
            $task->frequency = unserialize($task->frequency);
        }
    }
}