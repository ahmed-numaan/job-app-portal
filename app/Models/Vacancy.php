<?php
// app/Models/Vacancy.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Skill;

class Vacancy extends Model
{
    protected $fillable = [
        'company_id', 'title', 'description', 'location', 'salary_min', 'salary_max', 'vacancy_type',
        'experience_level', 'is_active', 'num_views', 'date_start', 'date_end'
    ];

    public function Skills()
    {
        return $this->belongsToMany(Skill::class, 'vacancy_skill');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value!='' ? date("Y-m-d", strtotime($value)):$value;
    }
    public function getDateStartAttribute($value)
    {
        return $value!='' ? date("Y-m-d", strtotime($value)):$value;
    }
    public function getDateEndAttribute($value)
    {
        return $value!='' ? date("Y-m-d", strtotime($value)):$value;
    }
}
