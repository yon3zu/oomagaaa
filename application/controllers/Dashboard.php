<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('login'))){
			echo "<script>alert('No Session Detected');document.location='".base_url('login')."';</script>";
		}
	}

    public function index()
    {
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $this->load->view('header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }

    public function stok_barang()
    {
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $data['stok'] = $this->model_inven->tampil_stok()->result();
        $this->load->view('header', $data);
        $this->load->view('stok_barang', $data);
        $this->load->view('footer');
    }

    public function delete_notes($id)
    {
        $where = array('id' => $id);
        $this->model_inven->hapus_notes($where, 'notes');
        redirect('dashboard');
    }

    public function post_notes()
    {
        date_default_timezone_set('Asia/Ujung_Pandang');
        $contents = $this->input->post('contents');
        $admin = $this->input->post('admin');
        $tgl = date("Y-M-d H:i A");
        $status = $this->input->post('status');

        $data = array(
            'contents'      => $contents,
            'admin'         => $admin,
            'tgl'           => $tgl,
            'status'        => $status
        );

        $this->model_inven->post_notes($data);
        if ($data) {
            $this->load->view('header');
            $this->load->view('alert/proses_edit');
            $this->load->view('footer');
        }
    }

    public function post_barang()
    {
        $nama = $this->input->post('nama');
        $merk = $this->input->post('merk');
        $ukuran = $this->input->post('ukuran');
        $stok = $this->input->post('stok');
        $satuan = $this->input->post('satuan');
        $lokasi = $this->input->post('lokasi');

        $config['max_size'] = '2048';
        $config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
        $config['upload_path'] = './images';
        $config['file_name'] = $_FILES['fotopost']['name'];

        $this->upload->initialize($config);

        if (!empty($_FILES['fotopost']['name'])) {
            if ($this->upload->do_upload('fotopost')) {
                $foto = $this->upload->data();
                $data = array(
                    'nama'          => $nama,
                    'merk'          => $merk,
                    'ukuran'        => $ukuran,
                    'stok'          => $stok,
                    'satuan'        => $satuan,
                    'foto'          => $foto['file_name'],
                    'lokasi'        => $lokasi
                );

                $this->model_inven->post_barang($data);
                if ($data) {
                    $this->load->view('header');
                    $this->load->view('alert/proses_post_brg');
                    $this->load->view('footer');
                }
            }else{
                echo "<script>alert('gagal upload');document.location='".base_url('dashboard/stok_barang')."';</script>";
            }
        }else{
            echo "<script>alert('data tidak masuk');document.location='".base_url('dashboard/stok_barang')."';</script>";
        }
    }

    public function delete_stok($id,$foto)
    {
        $path = './images/';
        $where = array('id_brg'    => $id);
        @unlink($path.$foto);
        $this->model_inven->delete_stok($where, 'tb_stok');
        redirect('dashboard/stok_barang');
    }

    public function edit_stok($id)
    {
        $where = array('id_brg' => $id);
        $data['stok'] = $this->model_inven->getEditdata($where, 'tb_stok')->result();
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $this->load->view('header', $data);
        $this->load->view('edit_barang', $data);
        $this->load->view('footer');

    }

    public function prosesEditStok()
    {
        $id = $this->input->post('id_brg');
        $nama = $this->input->post('nama');
        $merk = $this->input->post('merk');
        $ukuran = $this->input->post('ukuran');
        $stok = $this->input->post('stok');
        $satuan = $this->input->post('satuan');
        $lokasi = $this->input->post('lokasi');

        $path = './images/';

        $config['max_size'] = '2048';
        $config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
        $config['upload_path'] = './images';
        $config['file_name'] = $_FILES['fotopost']['name'];

        $this->upload->initialize($config);

        if (!empty($_FILES['fotopost']['name'])) {
            if ($this->upload->do_upload('fotopost')) {
                $foto = $this->upload->data();
                $data = array(
                    'nama'          => $nama,
                    'merk'          => $merk,
                    'ukuran'        => $ukuran,
                    'stok'          => $stok,
                    'satuan'        => $satuan,
                    'foto'          => $foto['file_name'],
                    'lokasi'        => $lokasi
                );

                $where = array('id_brg' => $id);
                @unlink($path.$this->input->post('filelama'));

                $this->model_inven->update_stok_brg($where,$data, 'tb_stok');
                echo "<script>alert('berhasil menambahkan barang');document.location='".base_url('dashboard/stok_barang')."';</script>";
            }
        }else{
            $data = array(
                'nama'          => $nama,
                'merk'          => $merk,
                'ukuran'        => $ukuran,
                'stok'          => $stok,
                'satuan'        => $satuan,
                'lokasi'        => $lokasi
            );

            $where = array('id_brg' => $id);

            $this->model_inven->update_stok_brg($where,$data, 'tb_stok');
                echo "<script>alert('berhasil menambahkan barang');document.location='".base_url('dashboard/stok_barang')."';</script>";
        }
    }

    public function barang_masuk()
    {
        $data['stok'] = $this->model_inven->tampil_stok()->result();
        $data['masuk'] = $this->model_inven->tampil_masuk();
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $this->load->view('header', $data);
        $this->load->view('barang_masuk', $data);
        $this->load->view('footer');
    }

    public function post_barang_masuk()
    {
        $id_brg = $this->input->post('id_brg');
        $tgl = $this->input->post('tgl');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'id_brg'    => $id_brg,
            'tgl'       => $tgl,
            'jumlah'    => $jumlah,
            'keterangan'   => $keterangan
        );

        $this->model_inven->post_barangMasuk($data);
        if ($data) {
            $this->load->view('header');
            $this->load->view('alert/proses_brg_msk');
            $this->load->view('footer');
        }
    }

    public function barang_keluar()
    {
        $data['stok'] = $this->model_inven->tampil_stok()->result();
        $data['keluar'] = $this->model_inven->tampil_keluar();
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $this->load->view('header', $data);
        $this->load->view('barang_keluar', $data);
        $this->load->view('footer');
    }

    public function post_barang_keluar()
    {
        $id_brg = $this->input->post('id_brg');
        $tgl = $this->input->post('tgl');
        $jumlah = $this->input->post('jumlah');
        $penerima = $this->input->post('penerima');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'id_brg'    => $id_brg,
            'tgl'       => $tgl,
            'jumlah'    => $jumlah,
            'penerima'  => $penerima,
            'keterangan'   => $keterangan
        );

        $this->model_inven->post_barangKeluar($data);
        if ($data) {
            $this->load->view('header');
            $this->load->view('alert/proses_brg_klr');
            $this->load->view('footer');
        }
    }

    public function delete_barang_masuk($id)
    {
        $where = array('id' => $id);
        $this->model_inven->hapus_brg_masuk($where, 'sbrg_masuk');
        redirect('dashboard/barang_masuk');
    }

    public function delete_barang_keluar($id)
    {
        $where = array('id' => $id);
        $this->model_inven->hapus_brg_keluar($where, 'sbrg_keluar');
        redirect('dashboard/barang_keluar');
    }

    public function edit_brg_keluar($id)
    {
        $where = array('id' => $id);
        $data['keluar'] = $this->model_inven->getWhere_tampil_keluar($where);
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $this->load->view('header', $data);
        $this->load->view('edit_barang_keluar', $data);
        $this->load->view('footer');
    }

    public function edit_brg_masuk($id)
    {
        $where = array('id' => $id);
        $data['masuk'] = $this->model_inven->getWhere_tampil_masuk($where);
        $data['notes'] = $this->model_inven->tampil_notes()->result();
        $this->load->view('header', $data);
        $this->load->view('edit_barang_masuk', $data);
        $this->load->view('footer');
    }

    public function proses_edit_brg_masuk()
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'tgl'       => $tgl,
            'jumlah'    => $jumlah,
            'keterangan'   => $keterangan
        );

        $where = array('id' => $id);

        $this->model_inven->update_brg_masuk($where,$data, 'sbrg_masuk');
        if ($data) {
            $this->load->view('header');
            $this->load->view('alert/proses_edit_msk');
            $this->load->view('footer');
        }
    }

    public function proses_edit_brg_keluar()
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $jumlah = $this->input->post('jumlah');
        $penerima = $this->input->post('penerima');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'tgl'       => $tgl,
            'jumlah'    => $jumlah,
            'penerima'  => $penerima,
            'keterangan'   => $keterangan
        );

        $where = array('id' => $id);

        $this->model_inven->update_brg_keluar($where,$data, 'sbrg_keluar');
        if ($data) {
            $this->load->view('header');
            $this->load->view('alert/proses_edit_klr');
            $this->load->view('footer');
        }
    }

}

/* End of file: Dashboard.php */
