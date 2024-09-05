<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*  @author   : Sujak Amir Sarifudin
*  date      : Mei 2023
*  helper untuk PPDB
*  https://istiqamahone.id
*/


function updateLogin($username)
{
    $CI =&  get_instance();
    $CI->load->database();
    $CI->db->where(['login'=>$username]);
    $CI->db->update('login',['lastlogin'=>date('Y-m-d H:i:s')]);
}

//function updateLoginPPDB($username)
// {
//     $CI =&  get_instance();
//     $CI->load->database();
//     $CI->db->where(['pin'=>$username]);
//     $CI->db->update('calonpendaftar',['lastlogin'=>date('Y-m-d H:i:s')]);
// }

// function getPin($email)
// {
//     $CI =&  get_instance();
//     $CI->load->database();
//     $result = $CI->db->get_where('calonpendaftar',['email'=>$email])->row_array();
//     return $result['pin'];
// }

// function getIdProses()
// {
//     $CI =&  get_instance();
//     $CI->load->database();
//     $result = $CI->db->get_where('prosespenerimaan',['aktif'=>1])->row_array();
//     return $result['replid'];
// } 