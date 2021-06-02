<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactsRepository::class)
 */
class Contacts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactMessage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $contactDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    public function getContactMessage(): ?string
    {
        return $this->contactMessage;
    }

    public function setContactMessage(string $contactMessage): self
    {
        $this->contactMessage = $contactMessage;

        return $this;
    }

    public function getContactDate(): ?DateTime
    {
        return $this->contactDate;
    }

    public function setContactDate(DateTime $contactDate): self
    {
        $this->contactDate = $contactDate;

        return $this;
    }
}
