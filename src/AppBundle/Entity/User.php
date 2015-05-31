<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users",
 *  uniqueConstraints={
 *      @ORM\UniqueConstraint(name="uniq_username_canonical",columns={"username_canonical"}),
 *      @ORM\UniqueConstraint(name="uniq_email_canonical",columns={"email_canonical"})
 *  })
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="UserData", mappedBy="user")
     */
    protected $data;

    public function __construct()
    {
        parent::__construct();
    }
}