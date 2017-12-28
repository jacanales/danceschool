<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GroupAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('id');
        $formMapper->add('name', 'text');
        $formMapper->add('weekday');
        $formMapper->add('hour');
        $formMapper->add('startDate');
        $formMapper->add('endDate');
        $formMapper->add('whatsappGroup');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id');
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->add('name');
        $listMapper->add('weekday');
        $listMapper->add('hour');
        $listMapper->add('startDate');
        $listMapper->add('endDate');
        $listMapper->add('whatsappGroup');
    }
}
