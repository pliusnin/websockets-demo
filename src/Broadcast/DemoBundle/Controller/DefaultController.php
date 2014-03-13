<?php

namespace Broadcast\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BroadcastDemoBundle:Default:index.html.twig');
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function sendMessageAction(Request $request)
    {
        $message = $request->get('message', '');

        $context = new \ZMQContext();
        $requester = new \ZMQSocket($context, \ZMQ::SOCKET_REQ);

        $requester->connect("tcp://127.0.0.1:5557");
        $requester->send($message);
        $requester->recv();

        return new JsonResponse(array('success' => true));
    }
}
