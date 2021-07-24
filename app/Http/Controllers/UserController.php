<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use DB;
use Validation;


class UserController extends Controller
{
	function __construct()
	{
		$this->setTitle("User");
		$this->setUrl("user");
	}

	private function __db()
	{
		$data = new \StdClass();
		$data->id = null;
		$data->full_name = null;
		$data->username = null;
		$data->email = null;

		return $data;
	}

	public function index()
	{
		$this->setBreadcrumb(['Master Data' => '#', 'User' => '#']);
		return $this->render('user.index');
	}

	public function grid(Request $request)
	{
		$data = User::all();

		return response()->json($data);
	}

	public function edit(Request $request, $id = null)
	{
		$user = User::find($id);
		$data = $user != null ? $user : $this->__db();
		$label = $user != null ? 'Ubah' : 'Tambah Baru';
		
		$this->setBreadcrumb(['Master Data' => '#', 'User' => '/user', $label => '#']);

		$data->hasRoles = $user != null ? $user->roles->pluck('name')->toArray() : [];
		$data->roles = Role::all()->pluck('name');
		return $this->render('user.edit', ['data' => $data]);
	}

	public function save(Request $request)
	{
		if(isset($request->id)){
			$request->validate([
				'username' => 'required',
				'email' => 'email',
			]);

			$user =	User::find($request->id);
			$user->update([
				'username' => $request->username,
				'email' => $request->email,
				'full_name' => $request->full_name
			]);
			$status = 'Berhasil mengubah user.';
		} else {
			$request->validate([
				'username' => 'required|unique:users,username',
				'email' => 'unique:users,email|email',
				'password' => 'required|min:5',
			]);

			$user = User::create([
				'username' => $request->username,
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'full_name' => $request->full_name
			]);
			$status = 'Berhasil menambah user baru.';
		}
		$user->syncRoles($request->roles);
		$request->session()->flash('success', $status);

		return redirect('/user');
	}

	public function delete($id)
	{
		$user = User::destroy($id);

		$results = array(
			'status' => 'success',
			'action' => 'Hapus Peran',
			'messages' => 'Peran berhasil dihapus'
		);

		return response()->json($results);
	}
}
