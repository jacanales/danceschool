<?php

namespace App\Admin;

use App\Form\Type\CourseType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CourseAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('course', CourseType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('id');
        $filter->add('name');
        $filter->add('price');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('id');
        $list->add('name');
        $list->add('price');
    }
}
