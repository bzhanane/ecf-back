<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     shortName= "Jobs",
 *   collectionOperations= {
 *          "get"={
 *              "normalization_context"= {
 *                 "groups"= {
 *                      "listes"
 *                   }
 *     }}},
 *   itemOperations={
 *          "get"={
 *              "normalization_context"= {
 *                 "groups"= {
 *                      "details"
 *                   }
 *     }}}
 * )
 * @ORM\Entity(repositoryClass=JobsRepository::class)
 *
 */
class Jobs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"details", "listes"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"details", "listes"})
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"details", "listes"})
     */
    private $type_contract;

    /**
     * @ORM\Column(type="date")
     * @Groups({"details", "listes"})
     */
    private $posted;

    /**
     * @ORM\Column(type="text")
     * @Groups({"details", "listes"})
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     * @Groups({"details", "listes"})
     */
    private $requirement;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="job")
     */
    private $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getTypeContract(): ?string
    {
        return $this->type_contract;
    }

    public function setTypeContract(string $type_contract): self
    {
        $this->type_contract = $type_contract;

        return $this;
    }

    public function getPosted(): ?\DateTimeInterface
    {
        return $this->posted;
    }

    public function setPosted(\DateTimeInterface $posted): self
    {
        $this->posted = $posted;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRequirement(): ?string
    {
        return $this->requirement;
    }

    public function setRequirement(string $requirement): self
    {
        $this->requirement = $requirement;

        return $this;
    }

    /**
     * @return Collection<int, Offer>
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setJob($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getJob() === $this) {
                $offer->setJob(null);
            }
        }

        return $this;
    }

    public function __toString(): string {
        return "";
    }


}
