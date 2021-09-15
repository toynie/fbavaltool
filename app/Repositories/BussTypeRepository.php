<?php

namespace App\Repositories;

use App\BussType;

class BussTypeRepository implements BussTypeRepositoryInterface{

  protected $bussType;

  // Constructor to bind model to repo
  public function __construct(BussType $model)
  {
    $this->bussType = $model;

  }

  // Get the associated model
  public function getModel()
  {
    return $this->bussType;
  }

 // Get the associated model
  public function setModel($model)
  {
    $this->bussType= $model;
    return $this;
  }

  public function all(){
    // return bussType::all();
    return $this->bussType->all();
  }

  public function get($set_id){
    // return bussType::find($set_id);
    return $this->bussType->find($set_id);
  }

  public function store(array $data)
  {
    return $this->bussType->create($data);
  }


  public function edit($id){
    return $this->bussType->findOrFail($id);
  }

  public function delete($bussType_id)
  {
    return $this->bussType->destroy($bussType_id);
  }

  public function update($id, array $set_data)
  {
    $bussType= $this->bussType->findOrFail($id);
    return $bussType->update($set_data);
  }

}
