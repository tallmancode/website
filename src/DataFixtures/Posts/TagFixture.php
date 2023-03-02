<?php

namespace App\DataFixtures\Posts;

use App\Entity\Posts\Tag;
use App\Service\FixtureHelper\FixtureHelper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagFixture extends Fixture
{
    public const DEV_TAGS = [
        [
            'name' => 'PHP',
            'slug' => 'php',
            'description' => 'Posts relating to PHP',
        ],
        [
            'name' => 'Javascript',
            'slug' => 'javascript',
            'description' => 'Posts relating to Javascript',
        ],
        [
            'name' => 'HTML',
            'slug' => 'html',
            'description' => 'Posts relating to HTML',
        ],
        [
            'name' => 'Vue.js',
            'slug' => 'vue',
            'description' => 'Posts relating to Vue.js',
        ],
        [
            'name' => 'Tutorials',
            'slug' => 'tutorials',
            'description' => 'Posts relating in which lessons are taught',
        ]
    ];

    private FixtureHelper $fixtureHelper;

    public function __construct(FixtureHelper $fixtureHelper)
    {
        $this->fixtureHelper = $fixtureHelper;
    }



    public function load(ObjectManager $manager): void
    {
        foreach(self::DEV_TAGS as $seed_data){
            /** @var Tag $tag */
            $tag = $this->fixtureHelper->mapArrayToEntity($seed_data, Tag::class);
            $manager->persist($tag);
        }
        $manager->flush();
    }
}
