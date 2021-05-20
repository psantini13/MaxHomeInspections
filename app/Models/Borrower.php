<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
}
