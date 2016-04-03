<?php
namespace SoftDeletable\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class TasksFixture extends TestFixture
{

      // Optional. Set this property to load fixtures to a different test datasource
      public $connection = 'test';

      public $fields = [
          'id' => ['type' => 'integer'],
          'title' => ['type' => 'string', 'length' => 255, 'null' => false],
          'body' => 'text',
          'deleted' => ['type' => 'integer', 'default' => '0', 'null' => false],
          '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']]
          ]
      ];
      public $records = [
          [
              'title' => 'Awesome Task',
              'body' => 'This task is so awesome',
              'deleted' => '0'
          ],
          [
              'title' => 'Deleted task',
              'body' => 'My poor deleted task',
              'deleted' => '1'
          ],
          [
              'title' => 'Another task',
              'body' => 'THE task',
              'deleted' => '2'
          ]
      ];
 }