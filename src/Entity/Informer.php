<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;
use Swagger\Annotations as SWG;
use JMS\Serializer\Annotation\ReadOnly;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformerRepository")
 */
class Informer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @SWG\Property(description="The unique identifier of the user.", readOnly=true)
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
    private $notificationCount = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @var array
     * @ORM\Column(type="json", length=255)
     * @Serializer\Type("array")
     */
    private $data = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $sort = 100;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     * @SWG\Property(description="дата создания", readOnly=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizedAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @SWG\Property(description="дата изменения", readOnly=true)
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @SWG\Property(description="дата удаления", readOnly=true)
     */
    private $deletedAt;

    /**
     * @var ServiceData
     * @ORM\ManyToOne(targetEntity="App\Entity\ServiceData", inversedBy="informers")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getServiceDataId")
     */
    private $serviceData;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Exclude()
     */
    private $userCreated;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @Serializer\Exclude()
     */
    private $userChanged;

    /**
     * @var InformerType
     * @ORM\ManyToOne(targetEntity="App\Entity\InformerType")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getTypeId")
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceData()
    {
        return $this->serviceData;
    }

    /**
     * @param ServiceData $serviceData
     */
    public function setServiceData(ServiceData $serviceData): void
    {
        $this->serviceData = $serviceData;
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

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(array $data): self
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

    public function getUserCreated(): ?Users
    {
        return $this->userCreated;
    }

    public function setUserCreated(?Users $userCreated): self
    {
        $this->userCreated = $userCreated;

        return $this;
    }

    public function getUserChanged(): ?Users
    {
        return $this->userChanged;
    }

    public function setUserChanged(?Users $userChanged): self
    {
        $this->userChanged = $userChanged;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(?InformerType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * необходим при сериализации объекта
     * @return int|null
     */
    public function getTypeId(){
        return $this->type->getId();
    }

    public function getServiceDataId(){
        return $this->serviceData->getId();
    }
}
