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
     * @ORM\OneToOne(targetEntity="UserData", mappedBy="user")
     */
    protected $data;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add datum
     *
     * @param \AppBundle\Entity\UserData $datum
     *
     * @return User
     */
    public function addDatum(\AppBundle\Entity\UserData $datum)
    {
        $this->data[] = $datum;

        return $this;
    }

    /**
     * Remove datum
     *
     * @param \AppBundle\Entity\UserData $datum
     */
    public function removeDatum(\AppBundle\Entity\UserData $datum)
    {
        $this->data->removeElement($datum);
    }

    /**
     * Get data
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getData()
    {
        return $this->data;
    }
}
