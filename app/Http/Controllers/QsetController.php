<?php

namespace App\Http\Controllers;

use App\Qset;
use App\Busstype;

use Illuminate\Http\Request;
use Session;
use App\Repositories\SetRepositoryInterface;
use App\Repositories\BussTypeRepositoryInterface;

class QsetController extends Controller
{

  // model property on class instances
  protected $repo_set;
  protected $repo_bussType;

  public function  __construct(SetRepositoryInterface $repo_set, BussTypeRepositoryInterface $repo_bussType){
    $this->repo_set = $repo_set;
    $this->repo_bussType = $repo_bussType;
  }

  public function index(Request $request)
  {
    // dd($request);
    $bussTypeId=$request->bussTypeId;
    $data = [
      'qset'=>$this->repo_set->all(),
      'bussType'=>$this->repo_bussType->get( $request->bussTypeId)
    ];
    return view('admin.qsets.index',compact('data','bussTypeId'));
  }

  public function create()
  {
    //

  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name'=>'required|',
      'id'=>'unique:qsets'
    ]);

    $this->repo_set->store(
        $request->only($this->repo_set->getModel()->fillable)
    );

    Session::flash('success', 'You successfully created a category');
    return redirect()->back();
  }

  public function edit(Request $request, $id )
  {

    // dd($request->bussTypeId);
    
    $qset = $this->repo_set->edit($id);
    $bussType=$this->repo_bussType->get( $request->bussTypeId);
    return view('admin.qsets.edit',compact('qset','bussType'));
  }

  public function update(Request $request, $id)
  {

    // dd($request->bussType);

    // $bussTypeId = $this->repo_bussType->get( $request->bussType);

    // $this->repo_set->update(
    //   $id,
    //   $request->only($this->repo_set->getModel()->fillable)
    // );

    // Session::flash('Success', 'You successfully updated a question set');
    // return redirect()->route('cms.sets.index',['bussTypeId'=>$request->bussType->id]);


    $this->repo_set->update(
      $id,
      $request->only($this->repo_set->getModel()->fillable)
    );



    $data = [
      'qset'=>$this->repo_set->all(),
      'bussType'=>$this->repo_bussType->get($request->bussType)
    ];
    Session::flash('Success', 'You successfully updated a question set');
    return view('admin.qsets.index',compact('data','bussType'));






  }

  public function destroy($id)
  {
    $this->repo_set->delete($id);

    Session::flash('Success', 'You successfully Deleted a question set');
    return redirect()->back();
  }

}
