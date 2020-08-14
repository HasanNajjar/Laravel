<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class); // SELECT * FROM user WHERE project_id = [project id]
    }
}
