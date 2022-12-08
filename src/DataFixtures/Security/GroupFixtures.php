<?php

/**
 * @Author: Gallarian <gallarian@gmail.com>
 */

declare(strict_types=1);

namespace App\DataFixtures\Security;

use App\Entity\Security\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

final class GroupFixtures extends Fixture
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $data = ['administrateur', 'modérateur', "validateur", 'rédacteur', 'utilisateurs'];

        foreach ($data as $k => $v) {
            $k++;
            $group = new Group();
            $group->setName($v);
            $group->setSlug($this->slugger->slug($group->getName())->lower()->toString());
            $group->setScope($k);
            $group->setIsActivate(true);

            $manager->persist($group);
        }

        $manager->flush();
    }
}
