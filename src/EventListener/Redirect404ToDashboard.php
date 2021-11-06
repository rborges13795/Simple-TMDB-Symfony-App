<?php
namespace App\EventListener;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class Redirect404ToDashboard
{
    private RouterInterface $router;
    
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }
    
    public function onKernelException(ExceptionEvent $event)
    {
        if (!$event->getThrowable() instanceof NotFoundHttpException) {
            return;
        }
        
        $response = new RedirectResponse($this->router->generate('dashboard'));
        
        $event->setResponse($response);
    }
}

