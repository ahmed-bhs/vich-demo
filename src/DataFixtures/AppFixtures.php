<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $image = new Image();

        $src = __DIR__ . '/images/barn-image.jpg';
        $fs = new Filesystem();
        $targetPath = \sys_get_temp_dir() . '/images/barn-image.jpg';
        $fs->copy($src, $targetPath, true);

        $file = new UploadedFile(
        $targetPath,
            'barn-image.jpg',
        null,
        null,
        true //  Set test mode true !!! " Local files are used in test mode hence the code should not enforce HTTP uploads."
        );

        $image->setImageFile($file);
        $manager->persist($image);

        $manager->flush();
    }
}
