<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation as Serializer;
use Swagger\Annotations as SWG;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostsRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Posts
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="User", fetch="EAGER")
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="Activity", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $activity;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $likes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Expose()
     * @Groups({"Posts"})
     * @SWG\Property()
     */
    private $dislikes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $user): self
    {
        $this->owner = $user;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getLikes(): ?string
    {
        return $this->likes;
    }

    public function setLikes(?string $likes): self
    {
        $this->likes = $likes;

        return $this;
    }

    public function getDislikes(): ?int
    {
        return $this->dislikes;
    }

    public function setDislikes(?int $dislikes): self
    {
        $this->dislikes = $dislikes;

        return $this;
    }
}