<?php

namespace App\Security\Core\User;

use App\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseUserProvider;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\User\UserInterface;

class FOSUBUserProvider extends BaseUserProvider
{
    /**
     * {@inheritdoc}
     */
    public function connect(UserInterface $user, UserResponseInterface $response)
    {
        $property = $this->getProperty($response);
        $username = $response->getUsername();

        //on connect - get the access token and the user ID
        $service = $response->getResourceOwner()->getName();

        $setter       = 'set' . \ucfirst($service);
        $setter_id    = $setter . 'Id';
        $setter_token = $setter . 'AccessToken';

        //we "disconnect" previously connected users
        if (null !== $previousUser = $this->userManager->findUserBy([$property => $username])) {
            $previousUser->$setter_id(null);
            $previousUser->$setter_token(null);
            $this->userManager->updateUser($previousUser);
        }

        //we connect current user
        $user->$setter_id($username);
        $user->$setter_token($response->getAccessToken());
        $user->setEnabled(true);

        $this->userManager->updateUser($user);
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $username = $response->getUsername();
        $user     = $this->userManager->findUserBy([$this->getProperty($response) => $username]);
        $email    = $response->getEmail();

        //check if the user already has the corresponding social account
        if (null === $user) {
            //check if the user has a normal account
            $user = $this->userManager->findUserByEmail($email);

            if (!$user instanceof UserInterface) {
                //if the user does not have a normal account, set it up:
                /**
                 * @var User
                 */
                $user = $this->userManager->createUser();

                $user->setUsername($email);
                $user->setEmail($email);
                $user->setPlainPassword(\md5(\uniqid('', false)));
            }

            $user->setName($response->getFirstName());
            $user->setLastname($response->getLastName());
            $user->setEnabled(true);

            $service = $response->getResourceOwner()->getName();
            switch ($service) {
                case 'facebook':
                    $user->setFacebookID($username);
                    break;
            }

            $this->userManager->updateUser($user);
        } else {
            //and then login the user
            $checker = new UserChecker();
            $checker->checkPreAuth($user);
        }

        return $user;
    }
}
