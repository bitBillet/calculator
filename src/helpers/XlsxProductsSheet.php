<?php

namespace App\helpers;

use App\Entity\Products;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * Class XlsxProductsSheet
 *
 * @package App\helpers
 */
class XlsxProductsSheet
{
	/**
	 * @var Worksheet
	 */
	private $sheet;

	/**
	 * @var Products[]
	 */
	private $products;

	/**
	 * Номер Колонки
	 *
	 * @var int
	 */
	private $rowNumber = 1;

	/**
	 * XlsxProductsSheet constructor.
	 *
	 * @param Worksheet $sheet
	 * @param array     $products
	 */
	public function __construct(Worksheet $sheet, array $products)
	{
		$this->products = $products;
		$this->sheet = $sheet;
	}

	/**
	 * Созданиве колонок таблицы exel
	 *
	 * @return Worksheet
	 */
	public function drawSheet(): Worksheet
	{
		$this->sheet->getColumnDimension('B')->setWidth(100);
		$this->sheet->setCellValue("A1", 'Кол-во');
		$this->sheet->setCellValue("B1", 'Описание');
		$this->rowNumber++;
		foreach ($this->products as $product) {
			$this->sheet->setCellValue("A{$this->rowNumber}", $product->getCount());
			$this->sheet->setCellValue("B{$this->rowNumber}", $product->getDescription());
			$this->rowNumber++;
		}

		return $this->sheet;
	}
}