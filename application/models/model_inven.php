<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_inven extends CI_Model {

    public function tampil_notes()
    {
        return $this->db->get('notes');
    }

    public function hapus_notes($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tampil_stok()
    {
        return $this->db->get('tb_stok');
    }

    public function post_notes($data)
    {
        $this->db->insert('notes',$data);
    }

    public function post_barang($data)
    {
        $this->db->insert('tb_stok', $data);
    }

    public function delete_stok($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function hapus_brg_masuk($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function hapus_brg_keluar($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_stok_brg($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function update_brg_masuk($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function update_brg_keluar($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function getEditdata($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function getBrgKeluar($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function getBrgMasuk($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function tampil_masuk()
    {
        $this->db->select('*');
        $this->db->from('sbrg_masuk');
        $this->db->join('tb_stok', 'sbrg_masuk.id_brg = tb_stok.id_brg');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_keluar()
    {
        $this->db->select('*');
        $this->db->from('sbrg_keluar');
        $this->db->join('tb_stok', 'sbrg_keluar.id_brg = tb_stok.id_brg');
        $query = $this->db->get();
        return $query->result();
    }

    public function post_barangMasuk($data)
    {
        $this->db->insert('sbrg_masuk', $data);
    }

    public function post_barangKeluar($data)
    {
        $this->db->insert('sbrg_keluar', $data);
    }

    public function getWhere_tampil_masuk($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->from('sbrg_masuk');
        $this->db->join('tb_stok', 'sbrg_masuk.id_brg = tb_stok.id_brg');
        $query = $this->db->get();
        return $query->result();
    }

    public function getWhere_tampil_keluar($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->from('sbrg_keluar');
        $this->db->join('tb_stok', 'sbrg_keluar.id_brg = tb_stok.id_brg');
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file: model_inven.php */
