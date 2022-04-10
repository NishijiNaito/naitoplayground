<?php
class Prepare_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // LOAD
    public function load_data($tb, $field = [], $value = [], $order = [], $by = []) {
        $field    = is_array($field) ? $field : [$field];
        $value    = is_array($value) ? $value : [$value];
        $order    = is_array($order) ? $order : [$order];
        $by            = is_array($by) ? $by : [$by];

        for ($i = 0; $i < count($field); $i++)
            $this->db->where($field[$i], $value[$i]);

        for ($i = 0; $i < count($order); $i++)
            $this->db->order_by($order[$i], isset($by[$i]) ? $by[$i] : 'ASC');

        return $this->db->get($tb)->result_array();
    }

    // INSERT
    public function insert_data($tb, $ar) {
        $this->db->insert($tb, $ar);
        return $this->db->insert_id();
    }
    public function insert_data_succ($tb, $ar) {

        return $this->db->insert($tb, $ar);
    }

    public function insert_batch($tb, $ar) {
        count($ar) == 0 ?: $this->db->insert_batch($tb, $ar);
    }

    //UPDATE
    public function update_data($tb, $field, $value, $ar) {
        $field    = is_array($field) ? $field : [$field];
        $value    = is_array($value) ? $value : [$value];
        for ($i = 0; $i < count($field); $i++) {
            $this->db->where($field[$i], $value[$i]);
        }
        return $this->db->update($tb, $ar);
    }

    //DELETE
    public function delete_data($tb, $field, $value) {
        $tb            = is_array($tb) ? $tb : [$tb];
        $field    = is_array($field) ? $field : [$field];
        $value    = is_array($value) ? $value : [$value];
        foreach ($tb as $ar_tb) {
            for ($i = 0; $i < count($field); $i++) {
                $this->db->where($field[$i], $value[$i]);
            }
            $this->db->delete($ar_tb);
        }
    }
    public function delete_one($tb, $field, $value) {
        $field    = is_array($field) ? $field : [$field];
        $value    = is_array($value) ? $value : [$value];
        for ($i = 0; $i < count($field); $i++) {
            $this->db->where($field[$i], $value[$i]);
        }
        return $this->db->delete($tb);
    }



    //OTHER

    public function displayDate($start, $stop = false, $color = true) {
        $m    = ['ม.ค.', 'ก.พ', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];

        $text    = '<div class="date ' . (!$color ?: ($start <= time('now') && $stop > time('now')  ? 'text-success' : 'text-muted')) . '"><span>' . date('j ', $start) . $m[date('n', $start) - 1] . ' ' . (date('Y', $start) + 543 - 2500) . ' | ' . date('G:i', $start) . '</span></div>';
        $text    .= $stop ? '<small><div class="date ' . (!$color ?: ($start <= time('now') && $stop > time('now')  ? 'text-warning' : 'text-muted')) . '"> <span>' . date('j ', $stop) . $m[date('n', $stop) - 1] . ' ' . (date('Y', $stop) + 543 - 2500) . ' | ' . date('G:i', $stop) . '</span></div></small>' : '';
        return $text;
    }

    public function displayFullDate($date) {
        $date = strtotime($date); //date to timestamp
        $m    = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน.', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        return date('j ', $date) . $m[date('n', $date) - 1] . ' ' . (date('Y', $date) + 543);
    }

    public function num2alpha($n) {
        for ($r = ""; $n >= 0; $n = intval($n / 26) - 1)
            $r = chr($n % 26 + 0x41) . $r;
        return $r;
    }
}
