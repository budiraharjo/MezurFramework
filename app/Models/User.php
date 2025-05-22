<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users'; // Nama tabel di database

    /**
     * Ambil semua data user
     */
    public function all()
    {
        return $this->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    /**
     * Cari user berdasarkan ID
     */
    public function find($id)
    {
        $stmt = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
        return $stmt->fetch();
    }

    /**
     * Tambah user baru
     */
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (name, email, password) VALUES (?, ?, ?)";
        return $this->query($sql, [
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
    }

    /**
     * Update data user
     */
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?";
        return $this->query($sql, [$data['name'], $data['email'], $id]);
    }

    /**
     * Hapus user
     */
    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
