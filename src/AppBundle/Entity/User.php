<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="users",
 *  uniqueConstraints={
 *      @ORM\UniqueConstraint(name="uniq_username_canonical",columns={"username_canonical"}),
 *      @ORM\UniqueConstraint(name="uniq_email_canonical",columns={"email_canonical"})
 *  })
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
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
     * @ORM\Column(type="string", nullable=true, options={"default":null})
     */
    protected $surname;

    /**
     * @var char
     *
     * @ORM\Column(type="string", nullable=true, length=1, options={"comment":"m: Male, f: female"})
     */
    protected $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true, options={"default":null})
     */
    protected $birthday;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    protected $phone;

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
     * @ORM\Column(type="string", length=2, nullable=true, options={"default":"ES"})
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true, options={"default":null})
     */
    protected $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, nullable=true, options={"default":null})
     */
    protected $identityNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $modified;

    public function __construct()
    {
        parent::__construct();

        $this->created = new \DateTime('now');
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt()
    {
        $this->created = new \DateTime('now');
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAt()
    {
        if (is_null($this->name)) {
            $this->name = $this->getUsername();
        }

        $this->modified = new \DateTime('now');
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     *
     * @return self
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set identityNumber
     *
     * @param string $identityNumber
     *
     * @return self
     */
    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;

        return $this;
    }

    /**
     * Get identityNumber
     *
     * @return string
     */
    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return self
     */
    public function setModified(\DateTime $modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }
}
