<?php

namespace App\Http\Controllers;

use App\Busstype;
use Session;
use App\Repositories\BussTypeRepositoryInterface;
use Illuminate\Http\Request;

class BusstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */


    // model property on class instances
    protected $repo_bussType;

    public function  __construct(BussTypeRepositoryInterface $repo_bussType){
        $this->repo_bussType = $repo_bussType;
    }

    public function getBusinessTypes(Request $request)
    {
      $data= [];
      $data["buss"] = Busstype::all();
    //   $data["sets"] = Qset::orderBy('id', 'asc')->get();
    //   $data["questions"] = Question::orderBy('id', 'asc')->get();
    //   $data["answers"] = Qanswer::orderBy('id', 'asc')->get();
      return $data;
    }

    public function front_getBusinessTypes(Request $request)
    {
      $data= [];
    //   $data["buss"] = Busstype::select('id','name')->get();
      $data["buss"] = Busstype::all();
    //   $data["sets"] = Qset::orderBy('id', 'asc')->get();
    //   $data["questions"] = Question::orderBy('id', 'asc')->get();
    //   $data["answers"] = Qanswer::orderBy('id', 'asc')->get();
    //   return $data;
      return view('frontend.select_business',compact('data'));
    }

    public function index()
    {
        //

        $data = [
            'bussTypes'=>$this->repo_bussType->all()
          ];

          // $highestPosition =Qset::select('position')->orderBy('id','desc');
          return view('admin.busstypes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name'=>'required|',
        //     'id'=>'unique:qsets'
        //   ]);
        $request['isActive']=True;
        // dd($request);

          $this->repo_bussType->store(
              $request->only($this->repo_bussType->getModel()->fillable)
          );

          Session::flash('success', 'You successfully created a bussiness type');
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Busstype  $bussType
     * @return \Illuminate\Http\Response
     */
    public function show(BussType $bussType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Busstype  $bussType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $bussType = $this->repo_bussType->edit($id);
        // dd($bussType );
        return view('admin.busstypes.edit',compact('bussType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Busstype  $bussType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BussType $bussType)
    {
        //
        // dd($bussType);

        $this->repo_bussType->update(
            $bussType->id,
            $request->only($this->repo_bussType->getModel()->fillable)
        );

        Session::flash('Success', 'You successfully updated Business Type');
        return redirect()->route('cms.bussTypes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Busstype  $bussType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BussType $bussType)
    {
        //
        $this->repo_bussType->delete($bussType->id);

        Session::flash('Success', 'You successfully Deleted a question set');
        return redirect()->back();
    }
}
