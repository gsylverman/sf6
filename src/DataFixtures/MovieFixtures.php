<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('Great moview');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2017/09/04/10/35/batman-2713459_960_720.jpg');
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Equilibrium');
        $movie2->setReleaseYear(2010);
        $movie2->setDescription('Great moview2');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2022/07/13/08/41/medieval-village-7318867_960_720.jpg');
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);



        $manager->flush();
    }
}
