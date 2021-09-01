<?php

namespace AppBundle\Faker\Provider;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HashPasswordProvider
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function passwordHash($plainPassword): string
    {
        return $this->encoder->hashPassword(new User(), $plainPassword);
    }
}
