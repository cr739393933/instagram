<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Profile extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function ProfileImage(){
        $imagePath = $this->image ?  $this->image : 'profile/no-image-icon-md.png';
        return '/storage/'. $imagePath ;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function follwers(){
        return $this->belongsToMany(User::class);
    }
}