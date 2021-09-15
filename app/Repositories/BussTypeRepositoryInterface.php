<?php

namespace App\Repositories;

interface BussTypeRepositoryInterface
{

    // Get the associated model
  public function getModel();

  public function all();

  public function store(array $data);

  public function edit($id);

  public function get($set_id);

  public function delete($set_id);

  public function update($set_id, array $set_data);

}
