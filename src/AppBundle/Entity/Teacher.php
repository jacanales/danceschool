<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teacher object
 *
 * @ORM\Entity
 * @ORM\Table(name="teachers")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Teacher
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $wage;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="course")
     */
    protected $groups;
}
