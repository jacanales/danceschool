<?php

namespace App\Admin;

use App\Form\Type\RoomType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RoomAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('room', RoomType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('id');
        $filter->add('name');
        $filter->add('price');
        $filter->add('city');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('name');
        $list->add('address');
        $list->add('city');
        $list->add('phone');
        $list->add('price');
    }
}
