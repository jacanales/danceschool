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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param int $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }
}
