<?php

namespace App\School\Domain\Entity;

class StudentAnnotation
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Student
     */
    protected $student;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $modified;

    public function setCreatedAt(): void
    {
        $this->created = new \DateTime('now');
    }

    public function setUpdatedAt(): void
    {
        $this->modified = new \DateTime('now');
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return StudentAnnotation
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return StudentAnnotation
     */
    public function setCreated(\DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @return StudentAnnotation
     */
    public function setModified(\DateTime $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    public function getModified(): \DateTime
    {
        return $this->modified;
    }

    /**
     * @return StudentAnnotation
     */
    public function setStudent(Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    /**
     * @return Student
     */
    public function getStudent(): ?Student
    {
        return $this->student;
    }
}
