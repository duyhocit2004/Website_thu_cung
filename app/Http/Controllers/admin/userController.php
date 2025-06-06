<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\User\IUserService;
use App\Service\User\UserService;
use App\Repository\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public $userService;
    // public function __construct(IUserService $userService)
    // {
    //     $this->userService = $userService;
    // }

    // public function GetPageUser()
    // {
    //     return view('admin.user.user');
    // }

    // public function GetUserAndAdmin()
    // {
    //     return $this->userService->GetUserAndAdmin();
    // }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Thêm người dùng thành công');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Kiểm tra nếu đang cập nhật tài khoản của chính mình
        if (auth()->id() == $user->id) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Bạn không thể khóa tài khoản của chính mình.');
        }

        $user->update([
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Cập nhật người dùng thành công.');
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'Bạn không thể tự khóa tài khoản của mình.');
        }

        if (!auth()->user()->is_admin) {
            abort(403, 'Không có quyền thực hiện hành động này.');
        }

        // Khóa tài khoản
        $user->is_active = false;
        $user->save();

        return redirect()->back()->with('success', 'Tài khoản đã bị khóa.');
    }



    // public function destroy(string $id)
    // {
    //     $user = User::findOrFail($id);

    //     $user->delete();

    //     return redirect()
    //         ->route('users.index')
    //         ->with('success', 'User deleted successfully.');
    // }
}
