<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    /**
     * Edit user
     *
     * @param $id
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update user
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update($id, Request $request)
    {
        $data = $request->all();
//        $post = User::where(['id' => $id])
//            ->update([
//                'name' => $data['name'],
//                'text' => $data['text']
//            ]);
//        if ($post) {
//            return redirect()->route('listAdmin');
//        }
//        return redirect()->route('editAdmin', ['id' => $id]);


        if (isset($data['image'])) {
            $fileName = time() . '_' . $data['image']->getClientOriginalName();
            $filePath = $data['image']->store('uploads', 'public');
            $updated = User::where(['id' => $id])
                ->update([
                    'image' => $filePath
                ]);

            return redirect()->route('listAdmin');
        }
        return redirect()->route('editAdmin', ['id' => $id]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
