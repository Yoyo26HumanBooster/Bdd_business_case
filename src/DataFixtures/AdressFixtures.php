<?php

namespace App\DataFixtures;

use App\Entity\Adress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdressFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {
        $adresss = [
            1 => [
                'ref_adress' => 'toto',
                'number_street' => 58,
                'name_street' => 'Rue de la petite école',
                'post_code' => '26000',
                'town' => 'Valence'
            ],
           
        ];

        foreach($adresss as $key => $value){
            $adress = new Adress();
            $adress->setNumberStreet($value['number_street']);
            $adress->setNameStreet($value['name_street']);
            $adress->setPostCode($value['post_code']);
            $adress->setTown($value['town']);
            $manager->persist($adress);
            
            $manager->flush();  

            $this->addReference('ADRESSE_'.$value['ref_adress'], $adress);            
        }
    
              

    }

}
