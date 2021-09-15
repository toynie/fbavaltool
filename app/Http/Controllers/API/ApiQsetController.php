<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Qset;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Repositories\SetRepositoryInterface;

class ApiQsetController extends Controller
{

  // model property on class instances
  protected $repo_set;

  //repository constructor
  public function  __construct(SetRepositoryInterface $repo_set){
    $this->repo_set = $repo_set;
  }

  //Get all Sets of Questions
  public function sets()
  {
    $data = [
        'qset'=>$this->repo_set->all()
      ];
    return $data;
  }

  //Get specific Set
  public function set(Request $request)
  {
    $qset = $this->repo_set->get($request->qsetId);
    return $qset;
  }

}
