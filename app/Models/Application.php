<?php
// app/Models/Vacancy.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vacancy;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'vacancy_id', 'resume', 'cover_letter', 'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }
}
