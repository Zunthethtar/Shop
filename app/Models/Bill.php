<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['owner_id', 'date', 'amount'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
