<?php

namespace App\Action\Student;

use App\Domain\Student\Service\StudentListDataTable;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

/**
 * Action.
 */
final class StudentListDataTableAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var StudentListDataTable
     */
    private $studentListDataTable;

    private $twig;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param StudentListDataTable $studentListDataTable The service
     */
    public function __construct(Responder $responder, StudentListDataTable $studentListDataTable, Twig $twig)
    {
        $this->responder = $responder;

        $this->studentListDataTable = $studentListDataTable;

        $this->twig = $twig;
    }

    /**
     * Action.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $params = (array)$request->getParsedBody();

        $data = $this->studentListDataTable->listAllStudents($params);
        $data['search_value'] = $params['search'];
        
        return $this->twig->render($response, 'students.twig', $data);
    }
}
