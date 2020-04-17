<?php

namespace App\Model\User\UseCase\SignUp\Request;


use App\Model\User\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;

class Handler
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function handle(Command $command): void
    {
        $email = mb_strtolower($command->email);
        if ($this->em->getRepository(User::class)->findOneBy(['email' => $email])) {
            throw new \DomainException('User already exists');
        }

        $user = new User(
            $email,
            password_hash($command->password, PASSWORD_BCRYPT)
        );

        $this->em->persist($user);
        $this->em->flush();
    }
}