<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public function createQuote(Request $request) {
        
    }
}
