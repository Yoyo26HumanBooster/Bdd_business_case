<?php

namespace App\DataFixtures;

use App\Entity\Garage;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GarageFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {
        $garages = [
            1 => [
                'ref_adress' => 'toto',
                'number_tel' => '0475421943',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
            
        ];

        foreach($garages as $key => $value){
            $garage = new Garage();
            $garage->setAdress($this->getReference('ADRESSE_'.$value['ref_adress']));
            $garage->setNumberTel($value['number_tel']);
            $garage->setCreatedAt($value['created_at']);
            $garage->setUpdatedAt($value['updated_at']);
            $manager->persist($garage);

            $manager->flush();

            $this->addReference('GARAGE_'.$garage->getNumberTel(), $garage);
            
            
        }
    
                

    }

}
