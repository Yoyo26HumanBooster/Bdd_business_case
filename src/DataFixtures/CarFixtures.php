<?php

namespace App\DataFixtures;

use App\Entity\Car;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)

    {
        $cars = [
            1 => [
                'reference' => 'BMW514RF',
                'description' => 'Cette très belle citadine et sportive d\'une puissance de 190 ch, vous procurera de belles sensations de conduite.',
                'price' => 24490,
                'registration_year' => 2018,
                'mileage' => 752156,
                'garage_tel' => '0475421943',
                'brand_name' => 'BMW',
                'model' => 'X1',
                'fuel_name' => 'Diesel',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            2 => [
                'reference' => 'BMW108GC',
                'description' => 'Cette très belle citadine et sportive d\'une puissance de 265 ch, vous procurera de belles sensations de conduite.',
                'price' => 64990,
                'registration_year' => 2018,
                'mileage' => 21014,
                'garage_tel' => '0475421943',
                'brand_name' => 'BMW',
                'model' => 'Série 7',
                'fuel_name' => 'Diesel',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            3 => [
                'reference' => 'AUD336LJ',
                'description' => 'Cette très belle citadine, vous procurera de belles sensations de conduite.',
                'price' => 16990,
                'registration_year' => 2016,
                'mileage' => 84700,
                'garage_tel' => '0475421943',
                'brand_name' => 'Audi',
                'model' => 'A1',
                'fuel_name' => 'Essence',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            4 => [
                'reference' => 'AUD917SE',
                'description' => 'Cette très belle 4 roues motrices, vous procurera une très bonne tenue de route.',
                'price' => 29990,
                'registration_year' => 2018,
                'mileage' => 20125,
                'garage_tel' => '0475421943',
                'brand_name' => 'Audi',
                'model' => 'Q2',
                'fuel_name' => 'Diesel',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            5 => [
                'reference' => 'ALF100YI',
                'description' => 'Grâce à sa boîte automatique, elle vous facilitera la conduite.',
                'price' => 7990,
                'registration_year' => 2012,
                'mileage' => 146017,
                'garage_tel' => '0475421943',
                'brand_name' => 'Alfa Romeo',
                'model' => 'Giulietta',
                'fuel_name' => 'Diesel',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            6 => [
                'reference' => 'ALF152GD',
                'description' => 'Vous ferez de belles économies grâce à cette belle berline de 105 ch.',
                'price' => 9190,
                'registration_year' => 2018,
                'mileage' => 63113,
                'garage_tel' => '0475421943',
                'brand_name' => 'Alfa Romeo',
                'model' => 'Mito',
                'fuel_name' => 'Essence',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            7 => [
                'reference' => 'CIT071OD',
                'description' => 'Grâce à cette citadine, vous réduirez à zéro votre empreinte carbone.',
                'price' => 8990,
                'registration_year' => 2016,
                'mileage' => 11209,
                'garage_tel' => '0475421943',
                'brand_name' => 'Citroën',
                'model' => 'C-ZERO',
                'fuel_name' => 'Electrique',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            8 => [
                'reference' => 'CIT729QZ',
                'description' => 'Grâce à cet utilitaire, vous roulerez sur tout type de route et par tous les temps.',
                'price' => 11990,
                'registration_year' => 2018,
                'mileage' => 92000,
                'garage_tel' => '0475421943',
                'brand_name' => 'Citroën',
                'model' => 'Berlingo',
                'fuel_name' => 'Diesel',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            9 => [
                'reference' => 'PEU827DA',
                'description' => 'Grâce à cette citadine compacte, vous pourrez vous garer très facilement.',
                'price' => 10990,
                'registration_year' => 2019,
                'mileage' => 18801,
                'garage_tel' => '0475421943',
                'brand_name' => 'Peugeot',
                'model' => '108',
                'fuel_name' => 'Essence',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],

            10 => [
                'reference' => 'PEU583JV',
                'description' => 'Laissez-vous séduire par ce magnifique break d\'un grand confort.',
                'price' => 50990,
                'registration_year' => 2020,
                'mileage' => 5000,
                'garage_tel' => '0475421943',
                'brand_name' => 'Peugeot',
                'model' => '508 SW',
                'fuel_name' => 'Hybride',
                'published_at' => new DateTime(),
                'updated_at' => new DateTime(),                 
            ],


            
        ];

        foreach($cars as $key => $value){
            $car = new Car();
            $car->setGarage($this->getReference('GARAGE_'.$value['garage_tel']));
            $car->setBrand($this->getReference('MARQUE_'.$value['brand_name']));
            $car->setModel($value['model']);
            $car->setFuel($this->getReference('MOTORISATION_'.$value['fuel_name']));
            $car->setReference($value['reference']);
            $car->setDescription($value['description']);
            $car->setPrice($value['price']);
            $car->setRegistrationYear($value['registration_year']);
            $car->setMileage($value['mileage']);
            $car->setPublishedAt($value['published_at']); 
            $car->setUpdatedAt($value['updated_at']); 
            
            $manager->persist($car);   
            
            $this->addReference('VOITURE_'.$value['reference'], $car);

        }
    
        $manager->flush();        

    }

    public function getDependencies()
    {
        return [
            GarageFixtures::class,
        ];
    }

}
