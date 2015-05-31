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
     * @ORM\Column(type="date", nullable=true)
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
     * @ORM\Column(type="datetime", nullable=false, options={"default":"CURRENT_TIMESTAMP"})
     */
    protected $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false, options={"default":"CURRENT_TIMESTAMP"})
     */
    protected $modified;

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt()
    {
        $this->modified = new \DateTime('now');
    }
}
