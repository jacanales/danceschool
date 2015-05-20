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
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $surname;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", options={comment:"0: Man, 1: Woman"})
     */
    protected $gender;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", columnDefinition="CHAR(2) NOT NULL")
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    protected $postal_code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    protected $identity_number;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $captation_method;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true, options={"default":false})
     */
    protected $member;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $contract_expiration;

    /**
     * @var string
     *
     * @ORM\Column(type="clob")
     */
    protected $remark;
}
