<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'branch_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function transactionsDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
  
}
