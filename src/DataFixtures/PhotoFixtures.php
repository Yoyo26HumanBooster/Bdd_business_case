<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PhotoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)

    {
        $photos = [
            1 => [
                'reference' => 'ALF100YI',
                'photo_path' => 'img/ALFA-ROMEO-GIULIETTA-1.JPG',
                'is_principal' => 1,
            ],

            2 => [
                'reference' => 'ALF100YI',
                'photo_path' => 'img/ALFA-ROMEO-GIULIETTA-2.JPG',
                'is_principal' => 0,
            ],

            3 => [
                'reference' => 'ALF152GD',
                'photo_path' => 'img/ALFA-ROMEO-MITO-1.JPG',
                'is_principal' => 1,
            ],

            4 => [
                'reference' => 'ALF152GD',
                'photo_path' => 'img/ALFA-ROMEO-MITO-2.JPG',
                'is_principal' => 0,
            ],

            5 => [
                'reference' => 'AUD336LJ',
                'photo_path' => 'img/AUDI-A1-SPORTBACK-1.JPG',
                'is_principal' => 1,
            ],

            6 => [
                'reference' => 'AUD336LJ',
                'photo_path' => 'img/AUDI-A1-SPORTBACK-2.JPG',
                'is_principal' => 0,
            ],

            7 => [
                'reference' => 'AUD917SE',
                'photo_path' => 'img/AUDI-Q2-1.JPG',
                'is_principal' => 1,
            ],

            8 => [
                'reference' => 'AUD917SE',
                'photo_path' => 'img/AUDI-Q2-2.JPG',
                'is_principal' => 0,
            ],

            9 => [
                'reference' => 'BMW108GC',
                'photo_path' => 'img/BMW-SERIE-7-1.JPG',
                'is_principal' => 1,
            ],

            10 => [
                'reference' => 'BMW108GC',
                'photo_path' => 'img/BMW-SERIE-7-2.JPG',
                'is_principal' => 0,
            ],

            11 => [
                'reference' => 'BMW514RF',
                'photo_path' => 'img/BMW-X1-1.JPG',
                'is_principal' => 1,
            ],

            12 => [
                'reference' => 'BMW514RF',
                'photo_path' => 'img/BMW-X1-2.JPG',
                'is_principal' => 0,
            ],

            13 => [
                'reference' => 'CIT729QZ',
                'photo_path' => 'img/CITROEN-BERLINGO-1.JPG',
                'is_principal' => 1,
            ],

            14 => [
                'reference' => 'CIT729QZ',
                'photo_path' => 'img/CITROEN-BERLINGO-2.JPG',
                'is_principal' => 0,
            ],

            15 => [
                'reference' => 'CIT071OD',
                'photo_path' => 'img/CITROEN-C-ZERO-1.JPG',
                'is_principal' => 1,
            ],

            16 => [
                'reference' => 'CIT071OD',
                'photo_path' => 'img/CITROEN-C-ZERO-2.JPG',
                'is_principal' => 0,
            ],

            17 => [
                'reference' => 'PEU827DA',
                'photo_path' => 'img/PEUGEOT-108-1.JPG',
                'is_principal' => 1,
            ],

            18 => [
                'reference' => 'PEU827DA',
                'photo_path' => 'img/PEUGEOT-108-2.JPG',
                'is_principal' => 0,
            ],

            19 => [
                'reference' => 'PEU583JV',
                'photo_path' => 'img/PEUGEOT-508-SW-1.JPG',
                'is_principal' => 1,
            ],

            20 => [
                'reference' => 'PEU583JV',
                'photo_path' => 'img/PEUGEOT-508-SW-2.JPG',
                'is_principal' => 0,
            ],
        ];

    
        foreach($photos as $key => $value){
            $photo = new Photo();
            $photo->setCar($this->getReference('VOITURE_'.$value['reference']));
            $photo->setPhotoPath($value['photo_path']);
            $photo->setIsPrincipal($value['is_principal']);
                       
            $manager->persist($photo);            

        }

        $manager->flush();        

    }

    public function getDependencies()
    {
        return [
            CarFixtures::class,
        ];
    }
   

}

