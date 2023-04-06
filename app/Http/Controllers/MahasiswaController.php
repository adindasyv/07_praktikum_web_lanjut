<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {
    $cariMahasiswa = $request->cariMahasiswa;
    $mahasiswas = Mahasiswa::where('nama', 'like', '%'.$cariMahasiswa.'%')->paginate(5);
    return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination

        // $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->paginate(6);
        // return view('mahasiswas.index',compact('mahasiswas'))->
        // with('i', (request()->input('page',1) - 1) * 5);
        $mahasiswas = Mahasiswa::paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'));
    }
    public function create()
    {
        return view('mahasiswas.create');
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            'tanggalLahir' => 'required',
        ]);
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil DItambahkan!');
    }
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan berdasar nim mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }
    public function edit($nim)
    {
        //menampilkan detail data dengan  menemukan berdasarkan nim mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.edit', compact('Mahasiswa'));
    }
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            'tanggalLahir' => 'required',
        ]);
        Mahasiswa::find($nim)->update($request->all());
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate!');
    }
    public function destroy($nim)
    {
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Dihapus!');
    }
};
