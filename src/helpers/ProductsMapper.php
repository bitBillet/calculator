<?php
declare(strict_types=1);

namespace App\helpers;

use App\Entity\Products;

/**
 * Class ProductsMapper
 *
 * @package App\helpers
 */
class ProductsMapper
{
	private $content;
	private $drawerId;

	/**
	 * ProductsMapper constructor.
	 *
	 * @param array $content
	 * @param int   $drawerId
	 */
	public function __construct(array $content, int $drawerId)
	{
		$this->content = $content;
		$this->drawerId = $drawerId;
	}

	/**
	 * @return Products[]
	 */
	public function getProduct(): array
	{
		$result = [];
		foreach ($this->content as $item) {
			$product = new Products();
			$product->setCount($item['count']);
			$product->setDescription($item['description']);
			$product->setDrawerId($this->drawerId);
			$result []= $product;
		}

		return $result;
	}
}