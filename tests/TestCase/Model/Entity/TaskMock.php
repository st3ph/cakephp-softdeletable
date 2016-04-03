<?php
namespace SoftDeletable\Test\TestCase\Model\Entity;

use Cake\ORM\Entity;

class TaskMock extends Entity
{
    use \SoftDeletable\Model\Table\Traits\SoftDeletableTrait;

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}