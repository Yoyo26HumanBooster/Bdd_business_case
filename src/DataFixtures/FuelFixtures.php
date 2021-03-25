<?php

namespace App\DataFixtures;

use App\Entity\Fuel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FuelFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {
        $fuels = [
            1 => [
                'fuel_name' => 'Essence'
            ],
            2 => [
                'fuel_name' => 'Diesel'
            ],
            3 => [
                'fuel_name' => 'Electrique'
            ],
            4 => [
                'fuel_name' => 'GPL'
            ],
            5 => [
                'fuel_name' => 'Hybride'
            ]
        ];

        foreach($fuels as $key => $value){
            $fuel = new Fuel();
            $fuel->setFuelName($value['fuel_name']);
            $manager->persist($fuel);

            $this->addReference('MOTORISATION_'.$value['fuel_name'], $fuel);
        }
    
        $manager->flush(); 
        
        

    }

}
