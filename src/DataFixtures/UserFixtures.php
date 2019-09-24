<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends BaseFixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setFirstName('AdminName');
        $user->setSecondName('AdminSurname');
        $user->setUsername('admin');
        $user->setEmail('admin@example.com');
        $user->setBirthDate(new \DateTime(sprintf('-%d years', rand(30, 70))));
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $this->createMany(User::class, 10, function (User $user, $count) {
            $user->setUsername(sprintf('teacher%d', $count));
            $user->setFirstName(sprintf('Teacher%d', $count));
            $user->setSecondName(sprintf('Researcher%d', $count));
            $user->setUsername(sprintf('teacher%d', $count));
            $user->setEmail(sprintf('teacher%d@example.com', $count));
            $user->setBirthDate(new \DateTime(sprintf('-%d years', rand(30, 70))));
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        });

        $manager->flush();
    }
}
