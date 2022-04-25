<?php

namespace App\Movements\Models;

use App\Common\Models\Traits\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use SoftDeletes;
}
