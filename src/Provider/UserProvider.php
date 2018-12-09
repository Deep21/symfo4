<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 03/12/18
 * Time: 22:50
 */

namespace App\Provider;


use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserProvider constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return void
     *
     */
    public function loadUserByUsername($username)
    {
        // TODO: Implement loadUserByUsername() method.
    }

    /**
     * @param int $id
     * @return \App\Entity\User|null
     */
    public function loadUserById(int $id)
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);
        return $user;
    }
    /**
     * Refreshes the user.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param UserInterface $user
     * @return void
     *
     */
    public function refreshUser(UserInterface $user)
    {
        dd("refreshUser");
        // TODO: Implement refreshUser() method.
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return void
     */
    public function supportsClass($class)
    {
        dd("supportsClass");
        // TODO: Implement supportsClass() method.
    }
}