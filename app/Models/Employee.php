<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'branch_id'];

    /**
     * Relasi ke model Branch
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Relasi ke model Transaction
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Mendapatkan nilai ENUM dari kolom yang diberikan
     *
     * @param string $column
     * @return array
     */
    public static function getEnumValues($column)
    {
        // Ambil tipe kolom dari database
        $type = DB::select("SHOW COLUMNS FROM employees WHERE Field = ?", [$column])[0]->Type;

        // Cocokkan pola ENUM dengan regex
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        if (!isset($matches[1])) {
            return []; // Jika bukan ENUM, kembalikan array kosong
        }

        // Pecah nilai ENUM menjadi array
        $enum = array_map(function ($value) {
            return trim($value, "'");
        }, explode(',', $matches[1]));

        return $enum;
    }
}
