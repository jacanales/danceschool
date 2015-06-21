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
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"})
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
     * @ORM\Column(type="date", columnDefinition="DATE", nullable=true, options={"default":null})
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupStudent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->annotations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set captationMethod
     *
     * @param integer $captationMethod
     *
     * @return Student
     */
    public function setCaptationMethod($captationMethod)
    {
        $this->captation_method = $captationMethod;

        return $this;
    }

    /**
     * Get captationMethod
     *
     * @return integer
     */
    public function getCaptationMethod()
    {
        return $this->captation_method;
    }

    /**
     * Set member
     *
     * @param boolean $member
     *
     * @return Student
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return boolean
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set contractExpiration
     *
     * @param \DateTime $contractExpiration
     *
     * @return Student
     */
    public function setContractExpiration($contractExpiration)
    {
        $this->contract_expiration = $contractExpiration;

        return $this;
    }

    /**
     * Get contractExpiration
     *
     * @return \DateTime
     */
    public function getContractExpiration()
    {
        return $this->contract_expiration;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Student
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
     * @return Student
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
     * Add groupStudent
     *
     * @param \AppBundle\Entity\GroupStudent $groupStudent
     *
     * @return Student
     */
    public function addGroupStudent(\AppBundle\Entity\GroupStudent $groupStudent)
    {
        $this->groupStudent[] = $groupStudent;

        return $this;
    }

    /**
     * Remove groupStudent
     *
     * @param \AppBundle\Entity\GroupStudent $groupStudent
     */
    public function removeGroupStudent(\AppBundle\Entity\GroupStudent $groupStudent)
    {
        $this->groupStudent->removeElement($groupStudent);
    }

    /**
     * Get groupStudent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupStudent()
    {
        return $this->groupStudent;
    }

    /**
     * Add annotation
     *
     * @param \AppBundle\Entity\StudentAnnotation $annotation
     *
     * @return Student
     */
    public function addAnnotation(\AppBundle\Entity\StudentAnnotation $annotation)
    {
        $this->annotations[] = $annotation;

        return $this;
    }

    /**
     * Remove annotation
     *
     * @param \AppBundle\Entity\StudentAnnotation $annotation
     */
    public function removeAnnotation(\AppBundle\Entity\StudentAnnotation $annotation)
    {
        $this->annotations->removeElement($annotation);
    }

    /**
     * Get annotations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnotations()
    {
        return $this->annotations;
    }
}
