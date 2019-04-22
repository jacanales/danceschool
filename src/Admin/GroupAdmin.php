<?php

namespace App\Admin;

use App\School\Domain\Entity\Course;
use App\School\Domain\Entity\Room;
use App\School\Domain\Entity\Teacher;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GroupAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('id');
        $form->add('name');
        $form->add(
            'course',
            EntityType::class,
            [
                'class'        => Course::class,
                'choice_label' => 'name',
            ]
        );
        $form->add(
            'room',
            ModelType::class,
            [
                'class'    => Room::class,
                'property' => 'name',
            ]
        );
        $form->add(
            'teacher',
            EntityType::class,
            [
                'class'        => Teacher::class,
                'choice_label' => 'fullname',
            ]
        );
        $form->add('weekday');
        $form->add('hour');
        $form->add('startDate');
        $form->add('endDate');
        $form->add('whatsappGroup');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('id');
        $filter->add('name');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('id');
        $list->add('name');
        $list->add('weekday');
        $list->add('hour');
        $list->add('startDate');
        $list->add('endDate');
        $list->add('whatsappGroup');
    }
}
