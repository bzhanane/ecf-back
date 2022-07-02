<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     shortName= "Company",
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
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"details", "listes"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"details", "listes"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups({"details", "listes"})
     */
    private $logo;

    /**
     * @ORM\Column(type="text")
     * @Groups({"details", "listes"})
     */
    private $logo_background;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"details", "listes"})
     */
    private $position;

    /**
     * @ORM\Column(type="text")
     * @Groups({"details", "listes"})
     */
    private $website;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="Own")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Jobs::class, mappedBy="company")
     */
    private $jobs;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogoBackground(): ?string
    {
        return $this->logo_background;
    }

    public function setLogoBackground(string $logo_background): self
    {
        $this->logo_background = $logo_background;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Jobs>
     */
    public function getJobs(): Collection
    {
        return $this->jobs;
    }

    public function addJob(Jobs $job): self
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs[] = $job;
            $job->setCompany($this);
        }

        return $this;
    }

    public function removeJob(Jobs $job): self
    {
        if ($this->jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getCompany() === $this) {
                $job->setCompany(null);
            }
        }

        return $this;
    }

}
