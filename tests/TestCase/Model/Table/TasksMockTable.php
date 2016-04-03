<?php
namespace App\Model\Table;

use App\Model\Table\AppTable;
use SoftDeletable\Model\Table\Traits\SoftDeletableTrait;

class TasksMockTable extends AppTable
{

    use SoftDeletableTrait;

    public function initialize(array $config)
    {
        $this->addBehavior('Deletable');
    }
}