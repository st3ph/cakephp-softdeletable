<?php
namespace SoftDeletable\Test\TestCase\Model\Behavior;

use SoftDeletable\Model\Behavior\SoftDeletableBehavior;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * SoftDeletable\Model\Behavior\SoftDeletableBehavior Test Case
 */
class SoftDeletableBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \SoftDeletable\Model\Behavior\SoftDeletableBehavior
     */
    public $Tasks;

    public $fixtures = [
        'plugin.SoftDeletable.tasks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Tasks = TableRegistry::get('Tasks');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tasks);

        parent::tearDown();
    }

    /**
     * Test beforeFind method
     *
     * @return void
     */
    public function testBeforeFind()
    {
        $tasks = $this->Tasks->find()->all();
        $this->assertEquals(count($tasks), 2, 'Test find tasks');
    }

    public function testBeforeFind_deleted()
    {
        $deletedTask = $this->Tasks->find()->where(['title' => 'Deleted task'])->first();
        $this->assertNull($deletedTask, 'Test deleted tasks not found');
    }

    public function testBeforeFind_deleted_specified()
    {
        $deletedTask = $this->Tasks->find('all')
                            ->where(['title' => 'Deleted task'])
                            ->where(['deleted' => 1])
                            ->first();
        $this->assertInstanceOf('SoftDeletable\Test\TestCase\Model\Entity\TaskMock', $deletedTask, 'Test deleted tasks found');
    }

    public function testBeforeFind_without_where()
    {
        $task = $this->Tasks->find('all')->first();
        $this->assertInstanceOf('SoftDeletable\Test\TestCase\Model\Entity\TaskMock', $task, 'Test find entity without where clause');
    }
}
