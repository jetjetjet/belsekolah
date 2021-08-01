<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
	function __construct()
	{
		$this->setTitle("Kelas");
		$this->setUrl("kelas");
	}

	private function __db()
	{
		$data = new \StdClass();
		$data->kode_kelas = null;
		$data->wali_kelas = null;
    $data->nama_kelas = null;
    $data->keterangan = null;

		return $data;
	}

	public function index()
	{
		$this->setBreadcrumb(['Master Data' => '#', 'Kelas' => '#']);
		return $this->render('kelas.index');
	}

	public function grid(Request $request)
	{
		$data = Kelas::leftjoin('guru as g', 'g.kode_guru', '=', 'kelas.wali_kelas')
    ->select(
      'kode_kelas',
      'nama_lengkap',
      'nama_kelas',
      'keterangan'
    )->get();

		return response()->json($data);
	}

	public function edit(Request $request, $id = null)
	{
		$get = Kelas::find($id);
		$data = $get != null ? $get : $this->__db();
		$label = $get != null ? 'Ubah' : 'Tambah Baru';
    $guru = Guru::all();
		
		$this->setBreadcrumb(['Master Data' => '#', 'Kelas' => '/kelas', $label => '#']);

		return $this->render('kelas.edit', ['data' => $data, 'guru' => $guru]);
	}

	public function save(Request $request, $id = null)
	{
    $data =	Kelas::find($id);
		if($data){
      $request->validate([
        'kode_kelas' => 'required', 
        'wali_kelas' => 'required',
        'nama_kelas' => 'required'
      ]);
			$data->update([
				'kode_kelas' => $request->kode_kelas,
        'wali_kelas' => $request->wali_kelas,
        'nama_kelas' => $request->nama_kelas,
        'keterangan' => $request->keterangan,
        'updated_by' => Auth::user()->getAuthIdentifier(),
			]);
			$status = 'Berhasil mengubah kelas.';
		} else {
      $request->validate([
        'kode_kelas' => 'required|unique:mapel,kode_mapel', 
        'wali_kelas' => 'required',
        'nama_kelas' => 'required'
      ]);
			Kelas::create([
				'kode_kelas' => $request->kode_kelas,
        'wali_kelas' => $request->wali_kelas,
        'nama_kelas' => $request->nama_kelas,
        'keterangan' => $request->keterangan,
        'created_by' => Auth::user()->getAuthIdentifier(),
			]);
			$status = 'Berhasil menambah kelas baru.';
		}
		$request->session()->flash('success', $status);

		return redirect('/kelas');
	}

	public function delete($id)
	{
    $data = Kelas::find($id);
    if($data){
      $data->update(['deleted_by' => Auth::user()->getAuthIdentifier()]);
      $data->destroy($id);
      $results = array(
        'status' => 'success',
        'action' => 'Hapus Kelas',
        'messages' => 'Kelas berhasil dihapus'
      );
    }else{
      $results = array(
        'status' => 'error',
        'action' => 'Kesalahan',
        'messages' => 'Kelas tidak ditemukan'
      );
    }
		return response()->json($results);
	}
}