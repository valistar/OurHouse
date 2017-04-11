<?php

namespace OurHouse\Models;


use Baum\Node;

/**
 * Property
 *
 * @property string name
 * @property string type
 * @property string description
 * @property \Illuminate\Database\Eloquent\Collection|Expense[] expenses
 * @property Maintenance\Schedule maintenanceSchedule
 *
 */
class Property extends Node
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'properties';

    //////////////////////////////////////////////////////////////////////////////

    // /**
    //  * Column to perform the default sorting
    //  *
    //  * @var string
    //  */
    // protected $orderColumn = null;

    // /**
    // * With Baum, all NestedSet-related fields are guarded from mass-assignment
    // * by default.
    // *
    // * @var array
    // */
    // protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

    //
    // This is to support "scoping" which may allow to have multiple nested
    // set trees in the same database table.
    //
    // You should provide here the column names which should restrict Nested
    // Set queries. f.ex: company_id, etc.
    //

//    /**
//     * Columns which restrict what we consider our Nested Set list
//     *
//     * @var array
//     */
//    protected $scoped = array('type');

    //////////////////////////////////////////////////////////////////////////////

    //
    // Baum makes available two model events to application developers:
    //
    // 1. `moving`: fired *before* the a node movement operation is performed.
    //
    // 2. `moved`: fired *after* a node movement operation has been performed.
    //
    // In the same way as Eloquent's model events, returning false from the
    // `moving` event handler will halt the operation.
    //
    // Please refer the Laravel documentation for further instructions on how
    // to hook your own callbacks/observers into this events:
    // http://laravel.com/docs/5.0/eloquent#model-events

    public function expenses()
    {
        return $this->hasMany('OurHouse\Models\Expense');
    }

    public function maintenanceSchedule()
    {
        return $this->hasOne('OurHouse\Models\Maintenance\Schedule');
    }
}
