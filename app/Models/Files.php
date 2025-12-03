<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['filename', 'size', 'type' ,'dojo_id'];

    /** @use HasFactory<\Database\Factories\FilesFactory> */
    use HasFactory;

    public function dojo()
    {
        return $this->belongsTo(Dojo::class); // Define the relationship to Dojo
    }
}
