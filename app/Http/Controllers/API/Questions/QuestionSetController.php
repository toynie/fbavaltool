<?php

namespace App\Http\Controllers\API\Questions;

use App\Http\Controllers\Controller;
use App\Repositories\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionSetController extends Controller
{

    /** @var QuestionRepositoryInterface */
    protected $repo_question;

    public function __construct(QuestionRepositoryInterface $repo_question)
    {
        $this->repo_question = $repo_question;
    }

    public function getAllFreeQuestions(Request $request)
    {
        return $this->repo_question->getFreeQuestiosWithAnswers($request->get('business_type'));

    }
}
