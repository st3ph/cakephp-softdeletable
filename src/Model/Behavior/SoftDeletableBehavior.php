<?php
namespace SoftDeletable\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;

class SoftDeletableBehavior extends Behavior
{
    protected $_defaultConfig = [
        'field' => 'deleted',
    ];

    public function beforeFind(Event $event, Query $query, $options, $primary)
    {
        $config = $this->config();
        $tableAlias = $query->repository()->alias();
        $founded = false;

        if($where = $query->clause('where')) {
            $where->iterateParts(function($w) use($config, $tableAlias, &$founded) {
                $field = is_object($w)?$w->getField():$w;
                if($field == $tableAlias.'.'.$config['field'] || $field == $config['field']) {
                    $founded = true;
                }

                return $w;
            });
        }

        if(!$founded) {
            $query->where(['deleted' => 0]);
        }
    }
}