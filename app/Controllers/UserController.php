<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;
use CodeIgniter\Commands\Utilities\Publish;
class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    protected $helpers=['Form'];

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        $data =[
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store()
    {

        $path = 'assets/upload/img/';

        $foto = $this->request->getFile('foto');

        $name = $foto->getRandomName();

        if(!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi dulu bro'
                ]
                ],
            'npm' => [
                'rules' => 'required|is_unique[user.npm]',
                'errors' => [
                    'required' => 'isi dulu bro',
                    'is_unique' => 'npm udah ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        if($foto->move($path, $name))
        {
            $foto = base_url($path. $name);
        }

        $this ->userModel->saveUser([
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
            'foto'      => $foto,
        ]);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'kelas' => $this->request->getVar('kelas'),
        ];

        return redirect()->to('/user');

    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user
        ];
        return view('profile', $data);
    }

    public function edit($id)
    {
        $user   = $this->userModel->getUser($id);
        $kelas  = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user'  => $user,
            'kelas' => $kelas,
        ];
        return view('edit_user', $data);
    }

    public function update($id){
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        
        $data = [
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
        ];

        if($foto->isValid()){
            $name = $foto->getRandomName();

            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);
                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);

        if(!$result){
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan data');
        }

        return redirect()->to(base_url('/user'));
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user'))
            ->with('success', 'Berhasil menghapus data');
    }
}