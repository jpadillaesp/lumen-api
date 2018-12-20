<?php

namespace App\Http\Controllers;

use App\User;
use App\Repository\UsersRepository;
use App\Transformer\UserTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Helpers ;
    
    protected $userRepository;
    protected $userTransformer;
    
    //    public function __construct() {
//        //
//        $this->middleware('auth', ['only' => [
//                'create',
//                'update',
//                'delete'
//        ]]);
//    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsersRepository $userRepository, UserTransformer $userTransformer) {
        //
        $this->middleware('auth', ['only' => [
                'create',
                'update',
                'delete'
        ]]);
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
        
    }
    
    public function show(){
        $user = $this->userRepository->getUserAll();
        
        $response = $this->response->item($user, new UserTransformer());
        return $response;
    }
    
    public function index() {
        $users = User::all();

        return response()->json($users);
    }

    public function find($id) {
        $user = User::find($id);

        return response()->json($user);
    }

    public function create(Request $request) {
        $user = User::create($request->all());

        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $updated = $user->update($request->all());

        return response()->json(['updated' => $updated]);
    }

    public function delete($id) {
        $count = User::destroy($id);
        return response()->json(['deleted' => $count == 1]);
    }
}
