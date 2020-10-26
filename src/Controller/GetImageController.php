<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetImageController extends AbstractController
{
    /** @var ImageRepository */
    protected $imageRepository;

    /**
     * GetImageController constructor.
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @Route("/api/images", name="get_image")
     */
    public function index(): Response
    {
        $images = [];
        foreach ($this->imageRepository->findAll() as $image) {
            $images['id'] = $image->getId();
            $images['imageName'] = $image->getImageName();
            $images['updatedAt'] = $image->getUpdatedAt();
        }

        return $this->json($images);
    }
}
