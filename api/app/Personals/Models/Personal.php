<?php

namespace App\Personals\Models;

use App\Common\Models\Traits\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use SoftDeletes;
}
