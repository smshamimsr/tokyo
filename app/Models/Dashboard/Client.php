<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    const WIDTH = 120;
    const HEIGHT = 50;
    const PATH = 'image/pertner/';
}
