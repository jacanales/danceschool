<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Course
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $group;

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
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param int $group
     *
     * @return self
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }
}
