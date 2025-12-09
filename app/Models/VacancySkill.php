<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use App\Models\Skill;

class VacancySkill extends Model
{
    protected $fillable = [
        'vacancy_id', 'skill_id'
    ];

    public function Skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    public function Vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }
}
