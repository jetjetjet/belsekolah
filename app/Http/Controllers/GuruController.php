<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
	function __construct()
	{
		$this->setTitle("Guru");
		$this->setUrl("guru");
	}

	private function __db()
	{
		$data = new \StdClass();
    $data->kode_guru = null;
		$data->kode_mapel = null;
		$data->photo_id = null;
    $data->nama_lengkap = null;
		$data->nuptk = null;
    $data->alamat = null;
    $data->kontak = null;
    $data->email = null;

		return $data;
	}

	public function index()
	{
		$this->setBreadcrumb(['Master Data' => '#', 'Guru' => '#']);
		return $this->render('guru.index');
	}

	public function grid(Request $request)
	{
		$data = Guru::leftjoin('mapel as m', 'm.kode_mapel', '=', 'guru.kode_mapel')
    ->select(
      'kode_guru',
      'nama_lengkap',
      'nama_mapel',
      'nuptk'
    )->get();

		return response()->json($data);
	}

	public function edit(Request $request, $id = null)
	{
		$guru = Guru::find($id);
		$data = $guru != null ? $guru : $this->__db();
		$label = $guru != null ? 'Ubah' : 'Tambah Baru';
    $mapel = MataPelajaran::all();
    // dd($mapel);
		
		$this->setBreadcrumb(['Master Data' => '#', 'Guru' => '/guru', $label => '#']);

		return $this->render('guru.edit', ['data' => $data, 'mapel' => $mapel]);
	}

	public function save(Request $request, $id = null)
	{
    $guru =	Guru::find($id);
    // dd($guru);
		if($guru){
			$request->validate([
        'kode_mapel' => 'required', 
        'email' => 'email|nullable'
			]);

			$guru->update([
				'kode_mapel' => $request->kode_mapel,
        'photo_id' => $request->photo_id,
        'alamat' => $request->alamat,
        'kontak' => $request->kontak,
        'email' => $request->email,
        'updated_by' => Auth::user()->getAuthIdentifier(),
			]);
			$status = 'Berhasil mengubah data guru.';
		} else {
			$request->validate([
        'kode_mapel' => 'required',
        'nama_lengkap' => 'required',
        'nuptk' => 'required|unique:guru,nuptk',
				'email' => 'unique:guru,email|email|nullable',
			]);

			Guru::create([
				'kode_mapel' => $request->kode_mapel,
				'nama_lengkap' => $request->nama_lengkap,
        'photo_id' => $request->photo_id,
        'nuptk' => $request->nuptk,
        'alamat' => $request->alamat,
        'kontak' => $request->kontak,
        'email' => $request->email,
        'created_by' => Auth::user()->getAuthIdentifier(),
			]);
			$status = 'Berhasil menambah guru baru.';
		}

		$request->session()->flash('success', $status);

		return redirect('/guru');
	}

	public function delete($id)
	{
    $guru = Guru::find($id);
    if($guru){
      $guru->update(['deleted_by' => Auth::user()->getAuthIdentifier()]);
      $guru->destroy($id);
      $results = array(
        'status' => 'success',
        'action' => 'Hapus Guru',
        'messages' => 'Guru berhasil dihapus'
      );
    }else{
      $results = array(
        'status' => 'error',
        'action' => 'Kesalahan',
        'messages' => 'Data guru tidak ditemukan'
      );
    }
		return response()->json($results);
	}
}