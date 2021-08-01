<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MataPelajaranController extends Controller
{
	function __construct()
	{
		$this->setTitle("Mata Pelajaran");
		$this->setUrl("mapel");
	}

	private function __db()
	{
		$data = new \StdClass();
		$data->kode_mapel = null;
		$data->nama_mapel = null;
    $data->keterangan = null;

		return $data;
	}

	public function index()
	{
		$this->setBreadcrumb(['Master Data' => '#', 'Mata Pelajaran' => '#']);
		return $this->render('mapel.index');
	}

	public function grid(Request $request)
	{
		$data = MataPelajaran::all();

		return response()->json($data);
	}

	public function edit(Request $request, $id = null)
	{
		$get = MataPelajaran::find($id);
		$data = $get != null ? $get : $this->__db();
		$label = $get != null ? 'Ubah' : 'Tambah Baru';
		
		$this->setBreadcrumb(['Master Data' => '#', 'Mata Pelajaran' => '/mapel', $label => '#']);

		return $this->render('mapel.edit', ['data' => $data]);
	}

	public function save(Request $request, $id = null)
	{
    $data =	MataPelajaran::find($id);
		if($data){
			$request->validate([
        'kode_mapel' => 'required', 
        'nama_mapel' => 'required'
			]);

			$data->update([
				'kode_mapel' => $request->kode_mapel,
        'nama_mapel' => $request->nama_mapel,
        'keterangan' => $request->keterangan,
        'updated_by' => Auth::user()->getAuthIdentifier(),
			]);
			$status = 'Berhasil mengubah mata pelajaran.';
		} else {
			$request->validate([
        'kode_mapel' => 'required|unique:mapel,kode_mapel', 
        'nama_mapel' => 'required'
			]);

			MataPelajaran::create([
				'kode_mapel' => $request->kode_mapel,
        'nama_mapel' => $request->nama_mapel,
        'keterangan' => $request->keterangan,
        'created_by' => Auth::user()->getAuthIdentifier(),
			]);
			$status = 'Berhasil menambah mata pelajaran baru.';
		}
		$request->session()->flash('success', $status);

		return redirect('/mapel');
	}

	public function delete($id)
	{
    $data = MataPelajaran::find($id);
    if($data){
      $data->update(['deleted_by' => Auth::user()->getAuthIdentifier()]);
      $data->destroy($id);
      $results = array(
        'status' => 'success',
        'action' => 'Hapus Mata Pelajaran',
        'messages' => 'Mata Pelajaran berhasil dihapus'
      );
    }else{
      $results = array(
        'status' => 'error',
        'action' => 'Kesalahan',
        'messages' => 'Mata Pelajaran tidak ditemukan'
      );
    }
		return response()->json($results);
	}
}
