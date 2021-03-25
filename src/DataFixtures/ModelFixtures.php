<?php

namespace App\DataFixtures;


use App\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModelFixtures extends Fixture
{
   
    
    public function load(ObjectManager $manager)

    {
        $models = [
            1 => [
                'brand_name' => 'BMW',
                'model_name' => 'X1'
            ],
            2 => [
                'brand_name' => 'BMW',
                'model_name' => 'Série 7'
            ],
            3 => [
                'brand_name' => 'Audi',
                'model_name' => 'A1'
            ],
            4 => [
                'brand_name' => 'Audi',
                'model_name' => 'Q2'
            ],
            5 => [
                'brand_name' => 'Alfa Romeo',
                'model_name' => 'Guilietta'
            ],
            6 => [
                'brand_name' => 'Alfa Romeo',
                'model_name' => 'Mito'
            ],
            7 => [
                'brand_name' => 'Citroën',
                'model_name' => 'C-ZERO'
            ],
            8 => [
                'brand_name' => 'Citroën',
                'model_name' => 'Berlingo'
            ],
            9 => [
                'brand_name' => 'Peugeot',
                'model_name' => '108'
            ],
            10 => [
                'brand_name' => 'Peugeot',
                'model_name' => '508 SW'
            ]
        ];

        foreach($models as $key => $value){
            $model = new Model();
            $model->setBrand($this->getReference('MARQUE_'.$value['brand_name']));
            $model->setModelName($value['model_name']);
            $manager->persist($model);      
        }
    
        $manager->flush();        

    }

}