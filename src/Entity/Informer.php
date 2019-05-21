<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformerRepository")
 */
class Informer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $errorCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $errorText;

    /**
     * @ORM\Column(type="integer")
     */
    private $notificationCount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $data;

    /**
     * @ORM\Column(type="integer")
     */
    private $sort;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ServiceData", inversedBy="informers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $serviceData;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userCreated;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $userChanged;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceData(): ?string
    {
        return $this->serviceData;
    }

    public function setServiceData(string $serviceData): self
    {
        $this->serviceData = $serviceData;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function setErrorCode(?string $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    public function getErrorText(): ?string
    {
        return $this->errorText;
    }

    public function setErrorText(?string $errorText): self
    {
        $this->errorText = $errorText;

        return $this;
    }

    public function getNotificationCount(): ?int
    {
        return $this->notificationCount;
    }

    public function setNotificationCount(int $notificationCount): self
    {
        $this->notificationCount = $notificationCount;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getActualizedAt(): ?\DateTimeInterface
    {
        return $this->actualizedAt;
    }

    public function setActualizedAt(?\DateTimeInterface $actualizedAt): self
    {
        $this->actualizedAt = $actualizedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getUserCreated(): ?User
    {
        return $this->userCreated;
    }

    public function setUserCreated(?User $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserChanged(): ?User
    {
        return $this->userChanged;
    }

    public function setUserChanged(?User $userChanged): self
    {
        $this->userChanged = $userChanged;

        return $this;
    }
}
