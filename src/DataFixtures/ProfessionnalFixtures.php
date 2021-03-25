<?php

namespace App\DataFixtures;

use App\Entity\Professionnal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfessionnalFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)

        {
            $professionnals = [
                1 => [
                    'email' => 'v.girard@gmail.com',
                    'password' => 'vincent',
                    'firstname' => 'Vincent',
                    'lastname' => 'Girard',
                    'telephone' => '0475328914',
                    'siret' => '80295478500028'
                ]
                
            ];

            foreach($professionnals as $key => $value){
                $professionnal = new Professionnal();
                $professionnal->setEmail($value['email']);
                $professionnal->setPassword($this->encoder->encodePassword($professionnal, 'password'));            
                $professionnal->setFirstname($value['firstname']);
                $professionnal->setLastname($value['lastname']);
                $professionnal->setTelephone($value['telephone']);
                $professionnal->setSiret($value['siret']);
                

                $manager->persist($professionnal);

                $this->addReference('PROFESSIONNEL_'.$value['email'], $professionnal);
            }
        
            $manager->flush();        

        }
    

}
