<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\DrawerSettings;
use App\Form\DrawerSettingsValidator;
use App\helpers\ContentManager;
use App\helpers\ProductsMapper;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SettingsController
 *
 * @package App\Controller
 */
class SettingsController extends AbstractController
{
	/**
	 * @Route("/", name="index")
	 */
	public function index(): Response
	{
		return $this->json(['coci' => 'cuka']);
	}

	/**
	 * @Route("/create", name="create")
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function createAction(Request $request): Response
	{
		$data = json_decode($request->getContent(), true);
		$validator = new DrawerSettingsValidator();
		$form = $this->createFormBuilder($validator)
			->add($validator::ATTR_CABINET_WIDTH, IntegerType::class)
			->add($validator::ATTR_SIDEWALL_HEIGHT, IntegerType::class)
			->add($validator::ATTR_SIDEWALL_BODY_WIDTH, IntegerType::class)
			->add($validator::ATTR_NOMINAL_LENGTH, IntegerType::class)
			->add($validator::ATTR_MATERIAL, TextType::class)
			->add($validator::ATTR_DAMPING_FUNCTION, TextType::class)
			->add($validator::ATTR_CONNECTION_TYPE, TextType::class)
			->add($validator::ATTR_COLOR, TextType::class)
			->getForm();
		$form->submit($data);
		if ($form->isSubmitted() && $form->isValid()) {
			$drawer = new DrawerSettings($data);
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($drawer);
			$entityManager->flush();
			$contentManager = new ContentManager();
			$content = $contentManager->generateContent($drawer);
			$productsMapper = new ProductsMapper($content, $drawer->getId());
			$products = $productsMapper->getProduct();
			foreach ($products as $product) {
				$entityManager->persist($product);
				$entityManager->flush();
			}

			return $this->json([
				'error' => false,
				'id' => $drawer->getId(),
				'content' => $content
			]);
		}

		return $this->json([
			'error' => true,
			'valid' => $form->isValid()
		]);
	}
}