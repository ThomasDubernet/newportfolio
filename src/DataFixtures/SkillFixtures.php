<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $array = ["HTML", "CSS", "Sass", "Javascript", "React.js", "Vue.js", "PHP", "Symfony", "Api Platform", "Api Mapbox", "GSAP", "Wordpress", "Docker"];
      for ($i=0; $i < count($array); $i++) { 
        $state = new Skill();
        $state->setName($array[$i]);
        $manager->persist($state);
      }

      $manager->flush();
    }
}
