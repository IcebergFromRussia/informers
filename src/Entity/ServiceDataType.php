<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceDataTypeRepository")
 */
class ServiceDataType
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $keyFieldRegex;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ыщке;

    /**
     * @ORM\Column(type="integer")
     */
    private $sort;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $dataSchema = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $formParams = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $blockUserCreate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $blockUserDelete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $blockUserDeactivate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServiceData", mappedBy="type")
     */
    private $serviceData;

    public function __construct()
    {
        $this->serviceData = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getKeyFieldRegex(): ?string
    {
        return $this->keyFieldRegex;
    }

    public function setKeyFieldRegex(?string $keyFieldRegex): self
    {
        $this->keyFieldRegex = $keyFieldRegex;

        return $this;
    }

    public function getыщке(): ?string
    {
        return $this->ыщке;
    }

    public function setыщке(string $ыщке): self
    {
        $this->ыщке = $ыщке;

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

    public function getDataSchema(): ?array
    {
        return $this->dataSchema;
    }

    public function setDataSchema(?array $dataSchema): self
    {
        $this->dataSchema = $dataSchema;

        return $this;
    }

    public function getFormParams(): ?array
    {
        return $this->formParams;
    }

    public function setFormParams(?array $formParams): self
    {
        $this->formParams = $formParams;

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

    public function getBlockUserCreate(): ?bool
    {
        return $this->blockUserCreate;
    }

    public function setBlockUserCreate(bool $blockUserCreate): self
    {
        $this->blockUserCreate = $blockUserCreate;

        return $this;
    }

    public function getBlockUserDelete(): ?bool
    {
        return $this->blockUserDelete;
    }

    public function setBlockUserDelete(bool $blockUserDelete): self
    {
        $this->blockUserDelete = $blockUserDelete;

        return $this;
    }

    public function getBlockUserDeactivate(): ?bool
    {
        return $this->blockUserDeactivate;
    }

    public function setBlockUserDeactivate(bool $blockUserDeactivate): self
    {
        $this->blockUserDeactivate = $blockUserDeactivate;

        return $this;
    }

    /**
     * @return Collection|ServiceData[]
     */
    public function getServiceData(): Collection
    {
        return $this->serviceData;
    }

    public function addServiceData(ServiceData $serviceData): self
    {
        if (!$this->serviceData->contains($serviceData)) {
            $this->serviceData[] = $serviceData;
            $serviceData->setType($this);
        }

        return $this;
    }

    public function removeServiceData(ServiceData $serviceData): self
    {
        if ($this->serviceData->contains($serviceData)) {
            $this->serviceData->removeElement($serviceData);
            // set the owning side to null (unless already changed)
            if ($serviceData->getType() === $this) {
                $serviceData->setType(null);
            }
        }

        return $this;
    }
}
