<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group object
 *
 * @ORM\Entity
 * @ORM\Table(name="student_annotations")
 *
 * @author Jesús A. Canales Diez <jacanalesdiez@gmail.com>
 */
class StudentAnnotation
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
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="annotations")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id", nullable=false)
     */
    protected $student;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    protected $message;

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
