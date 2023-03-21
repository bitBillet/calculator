<?php
declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class DrawerSettingsValidator
 *
 * @package App\Form
 */
class DrawerSettingsValidator
{
	/**
	 * @Assert\Range(
	 *     min = 200,
	 *     max = 1200,
	 *     minMessage = "You must be at least marks",
	 *     maxMessage = "Your maximum marks"
	 * )
	 */
	private $cabinet_width;
	const ATTR_CABINET_WIDTH = 'cabinetWidth';

	/**
	 * @Assert\NotBlank()
	 * @Assert\NotNull()
	 */
	private $sidewall_height;
	const ATTR_SIDEWALL_HEIGHT = 'sidewallHeight';

	/**
	 * @Assert\NotBlank()
	 * @Assert\NotNull()
	 */
	private $sidewall_body_width;
	const ATTR_SIDEWALL_BODY_WIDTH = 'sidewallBodyWidth';

	/**
	 * @Assert\NotBlank()
	 * @Assert\NotNull()
	 */
	private $nominal_length;
	const ATTR_NOMINAL_LENGTH = 'nominalLength';

	/**
	 * @Assert\NotNull()
	 * @Assert\NotBlank()
	 */
	private $damping_function;
	const ATTR_DAMPING_FUNCTION = 'dampingFunction';

	/**
	 * @Assert\NotNull()
	 * @Assert\NotBlank()
	 */
	private $material;
	const ATTR_MATERIAL = 'material';

	/**
	 * @Assert\NotNull()
	 * @Assert\NotBlank()
	 */
	private $connection_type;
	const ATTR_CONNECTION_TYPE = 'connectionType';

	/**
	 * @Assert\NotNull()
	 * @Assert\NotBlank()
	 */
	private $color;
	const ATTR_COLOR = 'color';

	/**
	 * @return int|null
	 */
	public function getCabinetWidth(): ?int
	{
		return $this->cabinet_width;
	}

	/**
	 * @param int $cabinet_width
	 *
	 * @return $this
	 */
	public function setCabinetWidth(int $cabinet_width): self
	{
		$this->cabinet_width = $cabinet_width;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSidewallHeight(): ?int
	{
		return $this->sidewall_height;
	}

	/**
	 * @param int $sidewall_height
	 *
	 * @return $this
	 */
	public function setSidewallHeight(int $sidewall_height): self
	{
		$this->sidewall_height = $sidewall_height;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSidewallBodyWidth(): ?int
	{
		return $this->sidewall_body_width;
	}

	/**
	 * @param int $sidewall_body_width
	 *
	 * @return $this
	 */
	public function setSidewallBodyWidth(int $sidewall_body_width): self
	{
		$this->sidewall_body_width = $sidewall_body_width;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getNominalLength(): ?int
	{
		return $this->nominal_length;
	}

	/**
	 * @param int $nominal_length
	 *
	 * @return $this
	 */
	public function setNominalLength(int $nominal_length): self
	{
		$this->nominal_length = $nominal_length;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDampingFunction(): ?string
	{
		return $this->damping_function;
	}

	/**
	 * @param string $damping_function
	 *
	 * @return $this
	 */
	public function setDampingFunction(string $damping_function): self
	{
		$this->damping_function = $damping_function;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getMaterial(): ?string
	{
		return $this->material;
	}

	/**
	 * @param string $material
	 *
	 * @return $this
	 */
	public function setMaterial(string $material): self
	{
		$this->material = $material;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getConnectionType(): ?string
	{
		return $this->connection_type;
	}

	/**
	 * @param string $connection_type
	 *
	 * @return $this
	 */
	public function setConnectionType(string $connection_type): self
	{
		$this->connection_type = $connection_type;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getColor(): ?string
	{
		return $this->color;
	}

	/**
	 * @param string $color
	 *
	 * @return $this
	 */
	public function setColor(string $color): self
	{
		$this->color = $color;

		return $this;
	}
}