<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {
        $brands = [
            1 => [
                'brand_name' => 'BMW'
            ],
            2 => [
                'brand_name' => 'Audi'
            ],
            3 => [
                'brand_name' => 'Alfa Romeo'
            ],
            4 => [
                'brand_name' => 'Citroën'
            ],
            5 => [
                'brand_name' => 'Peugeot'
            ]
        ];

        foreach($brands as $key => $value){
            $brand = new Brand();
            $brand->setBrandName($value['brand_name']);
            $manager->persist($brand);

            $this->addReference('MARQUE_'.$value['brand_name'], $brand);
        }
    
        $manager->flush();        

    }

}
