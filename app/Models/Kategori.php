<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // wajib, karena nama tabel tidak default plural dari 'Kategori'

    protected $fillable = ['nama'];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
