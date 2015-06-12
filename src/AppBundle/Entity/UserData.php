<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student object
 *
 * @ORM\Entity
 * @ORM\Table(name="users_data")
 * @ORM\HasLifecycleCallbacks
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class UserData
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="User", inversedBy="data")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

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
     * @ORM\Column(type="boolean", options={"comment":"0: Man, 1: Woman"})
     */
    protected $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $birthday;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15)
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
     * @ORM\Column(type="string", length=2, nullable=false, options={"default":"ES"})
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true, options={"default":null})
     */
    protected $postal_code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, nullable=true, options={"default":null})
     */
    protected $identity_number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="number", nullable=false, options={"default":"CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="number", nullable=false, options={"default":"CURRENT_TIMESTAMP"})
     */
    protected $modified;

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->modified = new \DateTime('now');
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return UserData
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
     * @return UserData
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
     * @param boolean $gender
     *
     * @return UserData
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean
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
     * @return UserData
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
     * @return UserData
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
     * @return UserData
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
     * @return UserData
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
     * @return UserData
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
     * @return UserData
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set identityNumber
     *
     * @param string $identityNumber
     *
     * @return UserData
     */
    public function setIdentityNumber($identityNumber)
    {
        $this->identity_number = $identityNumber;

        return $this;
    }

    /**
     * Get identityNumber
     *
     * @return string
     */
    public function getIdentityNumber()
    {
        return $this->identity_number;
    }

    /**
     * Set created
     *
     * @param \number $created
     *
     * @return UserData
     */
    public function setCreated(\number $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \number
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \number $modified
     *
     * @return UserData
     */
    public function setModified(\number $modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \number
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return UserData
     */
    public function setUser(\AppBundle\Entity\User $user)
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
}
