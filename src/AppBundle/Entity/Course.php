<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course object
 *
 * @ORM\Entity
 * @ORM\Table(name="courses")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Course
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
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="course")
     */
    protected $groups;

}
