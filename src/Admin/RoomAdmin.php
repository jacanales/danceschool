<?php

namespace App\Admin;

use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class RoomAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('name');
        $form->add('description');
        $form->add('price');
        $form->add('address');
        $form->add('city');
        $form->add('postalCode');
        $form->add('phone', PhoneNumberType::class, [
            'default_region'     => 'ES',
            'format'             => PhoneNumberFormat::NATIONAL]);
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
