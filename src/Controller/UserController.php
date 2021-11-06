<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends AbstractController
{
    private EntityManagerInterface $em;
    private UserPasswordHasherInterface $passwordHasher;
    
    public function __construct(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher)
    {
        $this->em = $em;
        $this->passwordHasher = $passwordHasher;
    }

    public function removeUser(Request $request)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }
        $user = $this->getUser();
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($user);
        $manager->flush();
        $session = new Session();
        $session->invalidate();
        return $this->redirect('/register');
    }
    
}
