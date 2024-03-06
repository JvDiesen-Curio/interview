<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;

    protected $fillable  = ['name'];

    public function saveTeam($data, $method)
    {
        if ($method === 'update') $this->update($data);
        else $this->create($data);
    }


    public function projects()
    {
        return $this->hasManyThrough(project::class, teamProject::class, null, 'id');
    }


    public function totalProjects()
    {

        return $this->projects()->get()->count();
    }
}
