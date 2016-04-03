<?php
namespace SoftDeletable\Model\Table\Traits;

trait SoftDeletableTrait
{
    protected $softDeleteField = 'deleted';

    public function softDelete($entity)
    {
        $entity->{$this->softDeleteField} = 1;
        return $this->save($entity);
    }
}