<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function index()
    {
        // menampilkan view index.php
        $this->load->view('index');
    }

    public function getBarang()
    {
        $this->db->from('barang');
        $data = $this->db->get()->result_array();

        echo json_encode($data);
    }

    public function tambah()
    {
        $data = array(
            'barang_nama' => $this->input->post('nama_barang'),
            'barang_harga' => $this->input->post('harga_barang'),
        );
        if ($this->db->insert('barang', $data)) {
            $return = array('true');
        } else {
            $return = array('false');
        }

        echo json_encode($return);
    }

    public function getBarangById()
    {
        $post = $this->input->post();
        if (isset($post['id'])) {
            $this->db->where('barang_id', $post['id']);
            $data = $this->db->get('barang')->row_array();
            if ($data) {
                $return = $data;
            } else {
                $return = array("false");
            }

            echo json_encode($return);
        }
    }

    public function edit()
    {
        $data = array(
            'barang_nama' => $this->input->post('nama_barang'),
            'barang_harga' => $this->input->post('harga_barang'),
        );

        $this->db->where('barang_id', $this->input->post('id_barang'));
        if ($this->db->update('barang', $data)) {
            $return = array('true');
        } else {
            $return = array('false');
        }

        echo json_encode($return);
    }

    public function hapus()
    {
        $post = $this->input->post();
        if (isset($post['id'])) {
            $this->db->where('barang_id', $post['id']);;
            if ($this->db->delete('barang')) {
                $return = array("true");
            } else {
                $return = array("false");
            }

            echo json_encode($return);
        }
    }
}
