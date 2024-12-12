<?php
class UserModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBase();
    }
    function checkUser($email, $password)
    {
        $sql = "SELECT * FROM khach_hang WHERE email = '$email' AND mat_khau = '$password'";
        return  $this->db->getOne($sql);
    }
    function insertUser($data)
    {
        $sql = "INSERT INTO khach_hang(ho,ten,email,mat_khau) VALUES (?,?,?,?)";
        $param = [$data['ho'], $data['ten'], $data['email'], $data['mat_khau']];
        return $this->db->insert($sql, $param);
    }
    function checkmail($email)
    {
        $sql = "SELECT * FROM khach_hang WHERE email='$email'";
        return  $this->db->getOne($sql);
    }
    function getUser()
    {
        $sql = "SELECT * FROM khach_hang";
        return $this->db->getAll($sql);
    }
    function getIdUser($iduser)
    {
        if ($iduser > 0) {
            $sql = "SELECT * FROM khach_hang WHERE id = $iduser";
            return $this->db->getOne($sql);
        }
    }
    function updateUser($data)
    {
        $sql = "UPDATE khach_hang SET mat_khau = ? WHERE email = ?";
        $param = [$data['newpass'], $data['email']];
        return $this->db->update($sql, $param);
    }
    function updateProfile($data)
    {
        $sql = "UPDATE khach_hang SET ho = ?,ten = ?, email = ?, sdt = ?, dia_chi = ?, avatar = ? WHERE id = ?";
        $param = [$data['firstname'], $data['lastname'], $data['email'], $data['sdt'], $data['address'], $data['image'], $data['idprofile']];
        return $this->db->update($sql, $param);
    }
    function getAllUser()
    {
        $sql = "SELECT * FROM khach_hang";
        return $this->db->getAll($sql);
    }
    function getCountAllUser()
    {
        $sql = "SELECT COUNT(*) as total FROM khach_hang";
        $result = $this->db->getOne($sql);
        return $result['total'];
    }
    function updateUserAdmin($data)
    {
        $sql = "UPDATE khach_hang SET trang_thai = ?, admin = ? WHERE id = ?";
        $param = [$data['status'], $data['admin'], $data['id']];
        return $this->db->update($sql, $param);
    }
    function updateResetCode($email, $reset_code){
        $sql = "UPDATE khach_hang SET reset_code = ? WHERE email = ?";
        $param = [$reset_code, $email];
        return $this->db->update($sql, $param);
    }
}
