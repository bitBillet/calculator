<?php

namespace App\Controller;

use App\Entity\Products;
use App\helpers\HtmlTableProduct;
use App\helpers\XlsxProductsSheet;
use PhpOffice\PhpSpreadsheet\Writer\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Snappy\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * Class FileController
 *
 * @package App\Controller
 */
class FileController extends AbstractController
{
	/**
	 * @Route("/pdf", name="pdf")
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function pdfAction(Request $request): Response
	{
		$id = $request->query->get('id');
		$productsRepo = $this->getDoctrine()->getRepository(Products::class);
		$products = $productsRepo->findBy(['drawer_id' => $id]);
		$productTable = new HtmlTableProduct($products);

		$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

		return new Response(
			$snappy->getOutputFromHtml($productTable->toHtml()),
			200,
			[
				'Content-Type'          => 'application/pdf',
				'Content-Disposition'   => 'attachment; filename="test.pdf"'
			]
		);
	}

	/**
	 * @Route("/xlsx", name="xlsx")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
	 * @throws Exception
	 */
	public function xlsxAction(Request $request): BinaryFileResponse
	{
		$id = $request->query->get('id');
		$productsRepo = $this->getDoctrine()->getRepository(Products::class);
		$products = $productsRepo->findBy(['drawer_id' => $id]);

		$spreadsheet = new Spreadsheet();

		$productsSheet = new XlsxProductsSheet($spreadsheet->getActiveSheet(), $products);
		$productsSheet->drawSheet();

		$writer = new Xlsx($spreadsheet);

		$fileName = 'test.xlsx';
		$temp_file = tempnam(sys_get_temp_dir(), $fileName);

		$writer->save($temp_file);

		return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
	}

}