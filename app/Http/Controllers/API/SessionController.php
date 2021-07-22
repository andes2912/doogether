<?php

namespace App\Http\Controllers\API;

use ErrorException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SessionService;

class SessionController extends Controller
{

    protected $session;

    public function __construct(SessionService $session)
    {
      $this->session = $session;
    }

    // LIST
    public function list(Request $request)
    {
      try {
        $result = $this->session->list($request->name ?? $request->duration);
        return response()->json([
            'message' => 'successfully',
            'data' => $result
        ], 201);

      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage(), $e->getCode());
      }
    }

    // View
    public function view($id, Request $request)
    {
      try {
        $result = $this->session->view($id);
        return response()->json([
            'message' => 'successfully',
            'data' => $result
        ], 201);
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage(), $e->getCode());
      }
    }

    // Create
    public function create(Request $request)
    {
      try {
        $result = $this->session->create($request);
        return \response()->json([
          'message' => 'Create Session successfully',
          'data'    => $result
        ], 200);
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage(), $e->getCode());
      }
    }

    // Update
    public function update($id, Request $request)
    {
      try {
        $result = $this->session->update($id, $request->all());
        return \response()->json([
          'message' => 'Update Session successfully',
          'data'    => $result
        ], 200);
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage(), $e->getCode());
      }
    }

    // Delete
    public function delete($id, Request $request)
    {
      try {
        $result = $this->session->delete($id, $request->all());
        return \response()->json([
          'message' => 'Delete Session successfully',
          'data'    => $result
        ], 200);
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage(), $e->getCode());
      }
    }
}
