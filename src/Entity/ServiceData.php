<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;
use JMS\Serializer\Annotation\ReadOnly;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceDataRepository")
 *
 */
class ServiceData
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @SWG\Property(description="The unique identifier of the user.", readOnly=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var ServiceDataType
     * @ORM\ManyToOne(targetEntity="App\Entity\ServiceDataType", inversedBy="serviceData")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Type("integer")
     * @Serializer\Accessor(getter="getTypeId")
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Serializer\Type("array")
     */
    private $data = [];

    /**
     * @ORM\Column(type="integer", options={"default"=100})
     */
    private $sort = 100;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     * @SWG\Property(description="дата создания", readOnly=true)
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     * @SWG\Property(description="дата изменения", readOnly=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @SWG\Property(description="дата удаления", readOnly=true)
     */
    private $deletedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Informer", mappedBy="serviceData", orphanRemoval=true)
     * @SWG\Property(description="информеры", readOnly=true)
     * @Serializer\Exclude()
     */
    private $informers;

    /**
     * @var Users
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     * @SWG\Property(description="кто создал", readOnly=true)
     * @Serializer\Exclude()
     */
    private $userCreated;

    /**
     * @var Users
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @SWG\Property(description="пользователь изменил", readOnly=true)
     * @Serializer\Exclude()
     */
    private $userChanged;

    public function __construct()
    {
        $this->informers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType()
    {
        return $this->type;
    }

    public function setType(?ServiceDataType $type): self
    {
        $this->type = $type;

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

    public function setData(?array $data): self
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

    /**
     * @return Collection|Informer[]
     */
    public function getInformers(): Collection
    {
        return $this->informers;
    }

    public function addInformer(Informer $informer): self
    {
        if (!$this->informers->contains($informer)) {
            $this->informers[] = $informer;
            $informer->setServiceData($this);
        }

        return $this;
    }

    public function removeInformer(Informer $informer): self
    {
        if ($this->informers->contains($informer)) {
            $this->informers->removeElement($informer);
            // set the owning side to null (unless already changed)
            if ($informer->getServiceData() === $this) {
                $informer->setServiceData(null);
            }
        }

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

    /**
     * необходим при сериализации объекта
     * @return int|null
     */
    public function getTypeId(){
        return $this->type->getId();
    }
}
