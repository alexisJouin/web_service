<?php

namespace BookBundle\Controller;

use BookBundle\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MemberController extends Controller{
    /**
     * Lists all Members entities.
     *
     */
    public function booksAction(Member $member)
    {  
        return new JsonResponse(array('books' => $member ));
    }

}
