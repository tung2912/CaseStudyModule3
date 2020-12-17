<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Requests\CreatUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        if (!$this->usercan('admin')){
            abort(403,__("You do not have permission!"));
        }
        $users = User::all();
        return view('admin.users.list',compact('users'));
    }

    public function create() {
        if (!$this->usercan('admin')){
            abort(403,__("You do not have permission!"));
        }
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.add',compact('users','roles'));
    }

    public function store(CreatUserRequest $request)
    {
        if (!$this->usercan('admin')){
            abort(403,__("You do not have permission!"));
        }
        $user = new User;
        $this->userService->add($request,$user);
        return redirect()->route('users.index')->with("addSuccess","Successfully Added");
    }

    public function edit($id)
    {
        if (!$this->usercan('admin')){
            abort(403,__("You do not have permission!"));
        }
        $user = $this->userService->findByID($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->usercan('admin')){
            abort(403,__("You do not have permission!"));
        }
        $user = $this->userService->findByID($id);
        $this->userService->update($request, $user);
        return redirect()->route('users.index')->with('updateSuccess','Successfully Updated');
    }

    public function destroy($id)
    {
        if (!$this->usercan('admin')){
            abort(403,__("You do not have permission!"));
        }
        $user = $this->userService->findByID($id);
        $user->delete();
        return redirect()->route('users.index')->with('deleteSuccess','Successfully deleted');
    }
}
