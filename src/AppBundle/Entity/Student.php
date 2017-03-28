<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

class Student
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $captationMethod;

    /**
     * @var bool
     */
    protected $member;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var \DateTime
     */
    protected $contractExpiration;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var GroupStudent
     */
    protected $groupStudent;

    /**
     * @var StudentAnnotation
     */
    protected $annotations;

    public function __construct()
    {
        $this->annotations  = new ArrayCollection();
        $this->groupStudent = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $captationMethod
     *
     * @return Student
     */
    public function setCaptationMethod($captationMethod)
    {
        $this->captationMethod = $captationMethod;

        return $this;
    }

    /**
     * @return int
     */
    public function getCaptationMethod()
    {
        return $this->captationMethod;
    }

    /**
     * @param bool $member
     *
     * @return self
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param \DateTime $contractExpiration
     *
     * @return self
     */
    public function setContractExpiration($contractExpiration)
    {
        $this->contractExpiration = $contractExpiration;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getContractExpiration()
    {
        return $this->contractExpiration;
    }

    /**
     * @param string $comment
     *
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param User $user
     *
     * @return self
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param StudentAnnotation $annotation
     *
     * @return self
     */
    public function addAnnotation(StudentAnnotation $annotation)
    {
        $this->annotations->add($annotation);

        return $this;
    }

    /**
     * @param StudentAnnotation $annotation
     */
    public function removeAnnotation(StudentAnnotation $annotation)
    {
        $this->annotations->removeElement($annotation);
    }

    /**
     * @return ArrayCollection
     */
    public function getAnnotations()
    {
        return $this->annotations;
    }

    /**
     * @param string $accountNumber
     *
     * @return self
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->getUser()->getName() . ' ' . $this->getUser()->getSurname();
    }
}
