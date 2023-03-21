<?php

namespace App\Entity;

use App\Repository\DrawerSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrawerSettingsRepository::class)
 */
class DrawerSettings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $cabinet_width;
    const ATTR_CABINET_WIDTH = 'cabinetWidth';

	/**
	 * @ORM\Column(type="smallint")
	 */
	private $sidewall_height;
	const ATTR_SIDEWALL_HEIGHT = 'sidewallHeight';

    /**
     * @ORM\Column(type="smallint")
     */
    private $sidewall_body_width;
    const ATTR_SIDEWALL_BODY_WIDTH = 'sidewallBodyWidth';

    /**
     * @ORM\Column(type="smallint")
     */
    private $nominal_length;
    const ATTR_NOMINAL_LENGTH = 'nominalLength';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $damping_function;
    const ATTR_DAMPING_FUNCTION = 'dampingFunction';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $material;
    const ATTR_MATERIAL = 'material';

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $connection_type;
    const ATTR_CONNECTION_TYPE = 'connectionType';

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $color;
	const ATTR_COLOR = 'color';

	public function __construct(array $data)
	{
		$this->setCabinetWidth($data[static::ATTR_CABINET_WIDTH]);
		$this->setDampingFunction($data[static::ATTR_DAMPING_FUNCTION]);
		$this->setConnectionType($data[static::ATTR_CONNECTION_TYPE]);
		$this->setNominalLength($data[static::ATTR_NOMINAL_LENGTH]);
		$this->setMaterial($data[static::ATTR_MATERIAL]);
		$this->setSidewallBodyWidth($data[static::ATTR_SIDEWALL_BODY_WIDTH]);
		$this->setColor($data[static::ATTR_COLOR]);
		$this->setSidewallHeight($data[static::ATTR_SIDEWALL_HEIGHT]);
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCabinetWidth(): ?int
    {
        return $this->cabinet_width;
    }

    public function setCabinetWidth(int $cabinet_width): self
    {
        $this->cabinet_width = $cabinet_width;

        return $this;
    }

	public function getSidewallHeight(): ?int
	{
		return $this->sidewall_height;
	}

	public function setSidewallHeight(int $sidewall_height): self
	{
		$this->sidewall_height = $sidewall_height;

		return $this;
	}

    public function getSidewallBodyWidth(): ?int
    {
        return $this->sidewall_body_width;
    }

    public function setSidewallBodyWidth(int $sidewall_body_width): self
    {
        $this->sidewall_body_width = $sidewall_body_width;

        return $this;
    }

    public function getNominalLength(): ?int
    {
        return $this->nominal_length;
    }

    public function setNominalLength(int $nominal_length): self
    {
        $this->nominal_length = $nominal_length;

        return $this;
    }

    public function getDampingFunction(): ?string
    {
        return $this->damping_function;
    }

    public function setDampingFunction(string $damping_function): self
    {
        $this->damping_function = $damping_function;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getConnectionType(): ?string
    {
        return $this->connection_type;
    }

    public function setConnectionType(string $connection_type): self
    {
        $this->connection_type = $connection_type;

        return $this;
    }

	public function getColor(): ?string
	{
		return $this->color;
	}

	public function setColor(string $color): self
	{
		$this->color = $color;

		return $this;
	}
}
