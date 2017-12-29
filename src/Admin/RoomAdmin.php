<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RoomAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('id');
        $formMapper->add('name');
        $formMapper->add('description');
        $formMapper->add('price');
        $formMapper->add('address');
        $formMapper->add('city');
        $formMapper->add('postalCode');
        $formMapper->add('phone');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id');
        $datagridMapper->add('price');
        $datagridMapper->add('city');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->add('name');
        $listMapper->add('description');
        $listMapper->add('price');
        $listMapper->add('city');
    }
}
