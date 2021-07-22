<?php

namespace App\Services;

use ErrorException;
use App\Models\Session;

class SessionService {

  // List
  public function list($params)
  {
    $sorted = $params['sort'] ?? 'ASC';

    try {
      $result = Session::
      where('name', 'LIKE' ,"%{$params}%") // filter by name
      ->orWhere('duration', 'LIKE' ,"%{$params}%") // filter by duration
      ->orderBy('created_at', $sorted)->paginate(10); // sort default ASC
      if ($result != $result) {
        throw new ErrorException('Data tidak ditemukan.', 404);
      }
      return $result;
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage(), $e->getCode());
    }
  }

  // Create
  public function create($data)
  {
    try {
      $result = Session::create([
        'userID'      => auth()->user()->id,
        'name'        => $data['name'],
        'description' => $data['description'],
        'start'       => $data['start'],
        'duration'    => $data['duration'],
      ]);
      return $result;
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage(), $e->getCode());
    }
  }

  // view
  public function view($id)
  {
    try {
      $result = Session::with('user')->find($id);

      if ($result == null) {
        throw new ErrorException('Data tidak ditemukan.', 404);
      }

      return $result;
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage(), $e->getCode());
    }
  }

  // Update
  public function update($id, $data)
  {
    try {
      $result = Session::find($id);

      if ($result->userID != auth()->user()->id) {
         throw new ErrorException('Tidak Memiliki Akses !', 401);
      }

      $result->name           = $data['name'];
      $result->description    = $data['description'];
      $result->start          = $data['start'];
      $result->duration       = $data['duration'];
      $result->save();

      return $result;
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage(), $e->getCode());
    }
  }

  // Delete
  public function delete($id)
  {
    try {
      $result = Session::find($id);

      if ($result->userID != auth()->user()->id) {
         throw new ErrorException('Tidak Memiliki Akses !', 401);
      }

      $result->delete();

      return $result;
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage(), $e->getCode());
    }
  }
}