<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Couleur;
use App\Entity\Produit;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $color1 = new Couleur();
        $color1->setNom("noir");
        $color2 = new Couleur();
        $color2->setNom("rouge");
        $manager->persist($color1);
        $manager->persist($color2);
        $product1 = new Produit();
        $product2 = new Produit();
        $product1->setModel("Iphone X");
        $product2->setModel("Galaxy S 10");
        $product1->setStockage(64);
        $product2->setStockage(64);
        $product1->setOs("IOS");
        $product2->setOs("Android");
        $product1->setPrix(1000);
        $product2->setPrix(1000);
        $product1->addCouleur($color2);
        $product2->addCouleur($color1);
        $manager->persist($product1);
        $manager->persist($product2);
        $customer = new Client();
        $customer->setNom("Capgemini");
        $customer->setContact("contact@capgemini.fr");
        $customer->setPassword($this->encoder->encodePassword($customer, $customer->getNom()));
        $manager->persist($customer);
        $user = new Utilisateur();
        $user->setClient($customer);
        $user->setPseudo("test");
        $user->setEmail("test@oc.fr");
        $manager->persist($user);
        $manager->flush();
    }
}
