<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('model_buku');
    }

    public function index()
    {
        $data['buku'] = $this->model_buku->get()->result();

        $this->template->load('template', 'admin/dashboard/dashboard', $data);
    }

    public function search()
    {

        $keyword = $this->input->post('keyword');

        $data['buku'] = $this->model_buku->getKeyword($keyword);

        $this->template->load('template', 'admin/dashboard/dashboard', $data);
    }

    public function detailBuku($id)
    {

        $data['buku'] = $this->model_buku->detail($id);

        $this->template->load('template', 'admin/dashboard/detail', $data);
    }
}
