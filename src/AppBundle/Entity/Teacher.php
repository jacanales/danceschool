<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Teacher object.
 *
 * @ORM\Entity
 * @ORM\Table(name="teachers")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class Teacher
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
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
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="teacher")
     */
    protected $group;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Group", mappedBy="teacher")
     */
    protected $groups;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set wage.
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
     * Get wage.
     *
     * @return float
     */
    public function getWage()
    {
        return $this->wage;
    }

    /**
     * Set comment.
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
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set user.
     *
     * @param User $user
     *
     * @return Teacher
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add group.
     *
     * @param Group $group
     *
     * @return Teacher
     */
    public function addClassGroup(Group $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group.
     *
     * @param Group $group
     */
    public function removeClassGroup(Group $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    public function getFullName()
    {
        return $this->getUser()->getName() . ' ' . $this->getUser()->getSurname();
    }
}
