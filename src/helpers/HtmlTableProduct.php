<?php
declare(strict_types=1);

namespace App\helpers;

use App\Entity\Products;

/**
 * Class HtmlTableProduct для генерирования html-таблицы
 *
 * @package App\helpers
 */
class HtmlTableProduct
{
	/**
	 * @var Products[]
	 */
	private $products;

	public function __construct(array $products)
	{
		$this->products = $products;
	}

	/**
	 * @return string
	 */
	public function toHtml(): string
	{
		$html = '<!doctype html><html lang="ru"><head><meta charset="UTF-8"><title>Document</title></head><body>';
		$html .= '<table><tr><th>Кол-во</th><th>Описоние</th></tr>';
		foreach ($this->products as $product) {
			$html .= "<tr><td>{$product->getCount()}</td><td>{$product->getDescription()}</td></tr>";
		}
		$html .= '</table></body></html>';

		return $html;
	}
}