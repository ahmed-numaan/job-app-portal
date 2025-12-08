<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AdminSite\Database\Factories\SkillFactory;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];

    public function getCreatedAtAttribute($value)
    {
        return $value!='' ? date("Y-m-d H:i", strtotime($value)):$value;
    }

    // protected static function newFactory(): SkillFactory
    // {
    //     // return SkillFactory::new();
    // }
}
