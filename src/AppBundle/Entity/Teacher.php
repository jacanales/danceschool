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
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"})
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set wage
     *
     * @param float $wage
     *
     * @return Teacher
     */
    public function setWage($wage)
    {
        $this->wage = $wage;

        return $this;
    }

    /**
     * Get wage
     *
     * @return float
     */
    public function getWage()
    {
        return $this->wage;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Teacher
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Teacher
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add group
     *
     * @param \AppBundle\Entity\Group $group
     *
     * @return Teacher
     */
    public function addClassGroup(\AppBundle\Entity\ClassGroup $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AppBundle\Entity\Group $group
     */
    public function removeClassGroup(\AppBundle\Entity\ClassGroup $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
