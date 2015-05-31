<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student object
 *
 * @ORM\Entity
 * @ORM\Table(name="students")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Student
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
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $captation_method;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     */
    protected $member;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", columnDefinition="DATETIME", nullable=true, options={"default":null})
     */
    protected $contract_expiration;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="GroupStudent", mappedBy="student")
     */
    protected $groupStudent;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="StudentAnnotation", mappedBy="student")
     */
    protected $annotations;
}
