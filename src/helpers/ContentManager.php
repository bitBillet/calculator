<?php
declare(strict_types=1);

namespace App\helpers;

use App\Entity\DrawerSettings;

/**
 * Class ContentManager
 *
 * @package App\helpers
 */
class ContentManager {
	/**
	 * @var string[]
	 */
	private $colors = [
		'silver' => 'серебристая',
		'beige' => 'бежевая',
		'darkGrey' => 'тёмно-серая'
		];

	/**
	 * @var string[]
	 */
	private $connectionTypes = [
		'screw' => 'под прикручивание',
		'press' => 'под запрессовку'
	];

	/**
	 * @var array
	 */
	private $result = [];

	private const COUNT = 'count';
	private const DESCRIPTION = 'description';

	private const ONE = 1;
	private const TWO = 2;

	public function generateContent(DrawerSettings $drawer): array
	{
		$this->result []= [
			static::DESCRIPTION => $this->generateSidewall(
				$drawer->getSidewallHeight(),
				$drawer->getCabinetWidth(),
				$drawer->getColor(),
				'Правый'
			),
			static::COUNT => static::ONE
		];
		$this->result []= [
			static::DESCRIPTION => $this->generateSidewall(
				$drawer->getSidewallHeight(),
				$drawer->getCabinetWidth(),
				$drawer->getColor(),
				'Левый'
			),
			static::COUNT => static::ONE
		];
		$this->result []= [
			static::DESCRIPTION => $this->generateConnector($drawer->getSidewallHeight(), $drawer->getColor(), 'Левый'),
			static::COUNT => static::ONE
		];
		$this->result []= [
			static::DESCRIPTION => $this->generateConnector($drawer->getSidewallHeight(), $drawer->getColor(), 'Правый'),
			static::COUNT => static::ONE
		];
		$this->result []= [
			static::DESCRIPTION => "Соеденитель перевней панели {$this->connectionTypes[$drawer->getConnectionType()]}",
			static::COUNT => static::TWO
		];
		$this->result []= [
			static::DESCRIPTION => $this->generateGuide($drawer->getCabinetWidth(), 'Левая'),
			static::COUNT => static::ONE
		];
		$this->result []= [
			static::DESCRIPTION => $this->generateGuide($drawer->getCabinetWidth(), 'Правая'),
			static::COUNT => static::ONE
		];
		if ('push-to-open' === $drawer->getDampingFunction()) {
			$this->result []= [
				static::DESCRIPTION => $this->generateDampingFunction(),
				static::COUNT => static::ONE
			];
		}

		return $this->result;
	}

	private function generateSidewall(int $height, int $width, string $color, string $pos): string
	{
		return "Боковина $height mm / $width mm, {$this->generateColor($color)}, $pos";
	}

	private function generateColor(string $color): string
	{
		return $this->colors[$color];
	}

	private function generateConnector(int $height, string $color, string $pos): string
	{
		return "Соединитель зандней стенки $height mm, {$this->generateColor($color)}, $pos";
	}

	private function generateGuide(int $width, string $pos): string
	{
		return "Направляющая с демпфером Silent System с механизмом Push to open Silent (опционально), $width мм, $pos";
	}

	private function generateDampingFunction(): string
	{
		return "Механизм Push to open Silent для, левая и правая";
	}
}