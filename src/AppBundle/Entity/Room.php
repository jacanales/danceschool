<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room object
 *
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Room
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
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=false)
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true, options={"default":null})
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable=true, options={"default":null})
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true, options={"default":null})
     */
    protected $postal_code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15)
     */
    protected $phone;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="course")
     */
    protected $groups;
}
