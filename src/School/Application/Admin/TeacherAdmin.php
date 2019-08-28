<?php

declare(strict_types=1);

namespace App\School\Application\Admin;

use App\School\UI\Form\Type\TeacherType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TeacherAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form->add('Teacher', TeacherType::class);
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('full_name');
        $list->add('user.email');
        $list->add('user.city');
    }
}
