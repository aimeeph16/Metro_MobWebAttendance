<?php
class DB_Functions {
    private $conn;
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // koneksi ke database
        // $db = new DB_Connect();
        // $this->conn = $db->connect();
    }
    // destructor
    function __destruct() {
         
    }

}

$db_func = new DB_Functions();
$db_func -> __construct();
    // public function simpanUser($Name, $Password) {
    //     $ID = uniqid('', true);
    //     $hash = $this->hashSSHA($Password);
    //     $Password = $hash["encrypted"]; // encrypted Password

    //     $stmt = $this->conn->prepare("INSERT INTO user(ID, Name, NIK, Password, salt) VALUES(?, ?, ?, ?, ?)");
    //     $stmt->bind_param("sssss", $ID, $Name, $NIK, $Password, $salt);
    //     $result = $stmt->execute();
    //     $stmt->close();
    //     // cek jika sudah sukses
    //     if ($result) {
    //         $stmt = $this->conn->prepare("SELECT * FROM user WHERE NIK = ?");
    //         $stmt->bind_param("s", $NIK);
    //         $stmt->execute();
    //         $user = $stmt->get_result()->fetch_assoc();
    //         $stmt->close();
    //         return $user;
    //     } else {
    //         return false;
    //     }
    // }
    // /**
    //  * Get user berdasarkan NIK dan Password
    //  */
    // public function getUserByNIKAndPassword($NIK, $Password) {
    //     $stmt = $this->conn->prepare("SELECT * FROM user WHERE NIK = ?");
    //     $stmt->bind_param("s", $NIK);
    //     if ($stmt->execute()) {
    //         $user = $stmt->get_result()->fetch_assoc();
    //         $stmt->close();
    //         // verifikasi Password user
    //         $salt = $user['salt'];
    //         $Password = $user['Password'];
    //         $hash = $this->checkhashSSHA($salt, $Password);
    //         // cek Password jika sesuai
    //         if ($Password == $hash) {
    //             // autentikasi user berhasil
    //             return $user;
    //         }
    //     } else {
    //         return NULL;
    //     }
    // }
    // /**
    //  * Cek User ada atau tidak
    //  */
    // public function isUserExisted($NIK) {
    //     $stmt = $this->conn->prepare("SELECT NIK from user WHERE NIK = ?");
    //     $stmt->bind_param("s", $NIK);
    //     $stmt->execute();
    //     $stmt->store_result();
    //     if ($stmt->num_rows > 0) {
    //         // user telah ada 
    //         $stmt->close();
    //         return true;
    //     } else {
    //         // user belum ada 
    //         $stmt->close();
    //         return false;
    //     }
    // }
    // /**
    //  * Encrypting Password
    //  * @param Password
    //  * returns salt and encrypted Password
    //  */
    // public function hashSSHA($Password) {
    //     $salt = sha1(rand());
    //     $salt = substr($salt, 0, 10);
    //     $encrypted = base64_encode(sha1($Password . $salt, true) . $salt);
    //     $hash = array("salt" => $salt, "encrypted" => $encrypted);
    //     return $hash;
    // }
    // /**
    //  * Decrypting Password
    //  * @param salt, Password
    //  * returns hash string
    //  */
    // public function checkhashSSHA($salt, $Password) {
    //     $hash = base64_encode(sha1($Password . $salt, true) . $salt);
    //     return $hash;
    // }



?>