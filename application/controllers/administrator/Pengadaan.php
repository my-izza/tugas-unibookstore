<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Memanggil Model
        $this->load->model(['model_buku', 'model_kategori', 'model_penerbit']);
    }

    public function index()
    {

        $buku = $this->model_buku->get()->result();
        $data = ['buku' => $buku];

        $data['buku'] = $this->model_buku->getPengadaan();

        $this->template->load('template', 'admin/pengadaan/pengadaan_data', $data);
    }


    public function search()
    {

        $keyword = $this->input->post('keyword');

        $data['buku'] = $this->model_buku->getKeyword($keyword);

        $this->template->load('template', 'admin/pengadaan/pengadaan_cari', $data);
    }
}
