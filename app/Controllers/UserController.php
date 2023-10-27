<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;
class UserController extends BaseController
{
    protected $helpers=['Form'];
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data=[
            'title'=>'List User',
            'users'=> $this->userModel->getUser(),
        
        ];
        return view('list_user',$data);
        //
    }

    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        // return True;
        // return view('welcome_message');
        return view('profile',$data);

    }

    public function create(){
        // $kelasModel = new KelasModel();
        $kelas =$this->kelasModel -> getKelas();
        // $data = [
        //     'kelas'=> $kelas,
        // ];
        // return view('create_user',$data);
        // $kelas = [
        //     [
        //         'id'=> 1,
        //         'nama_kelas'=>'A'
        //     ],
        //     [
        //         'id'=> 2,
        //         'nama_kelas'=>'B'
        //     ],
        //     [
        //         'id'=> 3,
        //         'nama_kelas'=>'C'
        //     ],
        //     [
        //         'id'=> 4,
        //         'nama_kelas'=>'D'
        //     ],
        // ];

        $data = [
            'title' => 'createuser',
            'kelas' => $kelas,
            
        ];

        return view('create_user',$data);
    }

    public function store(){
        $userModel = new UserModel();

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $name = $foto->getRandomName();

        if(!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
                ],
            'npm' => [
                'rules' => 'required|is_unique[user.npm]',
                'errors' => [
                    'required' => 'NPM harus diisi!',
                    'is_unique' => 'NPM sudah digunakan'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        if($foto->move($path,$name)){
            $foto = base_url ($path . $name);
        }

        $userModel->saveUser([
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
            'foto'      => $foto
        ]);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'kelas' => $this->request->getVar('kelas'),
        ];

        return redirect()->to('/user');

    }

    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];

        return view('profile', $data);
    }

}