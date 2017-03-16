<?php

namespace BookBundle\Controller;

use BookBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Book controller.
 *
 */
class BookController extends Controller
{
  /**
   * Lists all book entities.
   *
   */
  public function indexAction()
  {
    $em = $this->getDoctrine()->getManager();

    $books = $em->getRepository('BookBundle:Book')->findAll();

    return new JsonResponse(array('books' => $books));
  }

  /**
   * Creates a new book entity.
   *
   */
  public function newAction(Request $request)
  {
    $book = new Book();

    $data = json_decode($request->getContent(), true);
    $name = $data['name'];
    $category = $data['category'];

    $book->setName($name);
    $book->setCategory($category);

    $em = $this->getDoctrine()->getManager();
    $em->persist($book);
    $em->flush($book);

    return new JsonResponse($book);
  }

  /**
   * Finds and displays a book entity.
   *
   */
  public function showAction(Book $book)
  {
    return new JsonResponse($book);
  }

  /**
   * Displays a form to edit an existing book entity.
   *
   */
  public function editAction(Request $request, Book $book)
  {
    $data = json_decode($request->getContent(), true);
    $name = $data['name'];
    $category = $data['category'];

    $book->setName($name);
    $book->setCategory($category);

    $this->getDoctrine()->getManager()->flush();

    return new JsonResponse($book);
  }

  /**
   * Deletes a book entity.
   *
   */
  public function deleteAction(Request $request, Book $book)
  {
    $em = $this->getDoctrine()->getManager();
    $em->remove($book);
    $em->flush();

    return new JsonResponse("Livre bien supprimé !");
  }
}
