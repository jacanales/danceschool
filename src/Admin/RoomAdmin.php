<?php

namespace App\Admin;

use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RoomAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name');
        $formMapper->add('description');
        $formMapper->add('price');
        $formMapper->add('address');
        $formMapper->add('city');
        $formMapper->add('postalCode');
        $formMapper->add('phone', PhoneNumberType::class, [
            'default_region'     => 'ES',
            'format'             => PhoneNumberFormat::NATIONAL]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id');
        $datagridMapper->add('name');
        $datagridMapper->add('price');
        $datagridMapper->add('city');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->add('address');
        $listMapper->add('city');
        $listMapper->add('phone');
        $listMapper->add('price');
    }
}
