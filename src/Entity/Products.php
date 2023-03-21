<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $drawer_id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $count;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

	/**
	 * @return int|null
	 */
    public function getDrawerId(): ?int
    {
        return $this->drawer_id;
    }

	/**
	 * @param int $drawer_id
	 *
	 * @return $this
	 */
    public function setDrawerId(int $drawer_id): self
    {
        $this->drawer_id = $drawer_id;

        return $this;
    }

	/**
	 * @return int|null
	 */
    public function getCount(): ?int
    {
        return $this->count;
    }

	/**
	 * @param int $count
	 *
	 * @return $this
	 */
    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

	/**
	 * @return string|null
	 */
    public function getDescription(): ?string
    {
        return $this->description;
    }

	/**
	 * @param string $description
	 *
	 * @return $this
	 */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
