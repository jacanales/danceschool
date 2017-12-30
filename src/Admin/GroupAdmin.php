<?php

namespace App\Admin;

use App\Entity\Course;
use App\Entity\Room;
use App\Entity\Teacher;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GroupAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('id');
        $formMapper->add('name');
        $formMapper->add(
            'course',
            EntityType::class,
            [
                'class' => Course::class,
                'choice_label' => 'name'
            ]
        );
        $formMapper->add(
            'room',
            EntityType::class,
            [
                'class' => Room::class,
                'choice_label' => 'name'
            ]
        );
        $formMapper->add(
            'teacher',
            EntityType::class,
            [
                'class' => Teacher::class,
                'choice_label' => 'fullname'
            ]
        );
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
