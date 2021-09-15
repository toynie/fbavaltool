<?php

namespace App\Repositories;

use App\Qset;

class SetRepository implements SetRepositoryInterface{

  protected $qset;

  // Constructor to bind model to repo
  public function __construct(Qset $model)
  {
    $this->qset = $model;

  }

  // Get the associated model
  public function getModel()
  {
    return $this->qset;
  }

 // Get the associated model
  public function setModel($model)
  {
    $this->qset= $model;
    return $this;
  }

  public function all(){
    // return QSet::all();
    return $this->qset->all();
  }

  public function get($set_id){
    // return Qset::find($set_id);
    return $this->qset->find($set_id);
  }

  public function store(array $data)
  {
    return $this->qset->create($data);
  }


  public function edit($id){
    return $this->qset->findOrFail($id);
  }

  public function delete($set_id)
  {
    return $this->qset->destroy($set_id);
  }

  public function update($id, array $set_data)
  {
    $set = $this->qset->findOrFail($id);
    return $set->update($set_data);
  }

}
