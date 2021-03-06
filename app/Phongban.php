<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CongVanPB;

class Phongban extends Model
{
        //
        protected $table = 'tbl_phongban';
        protected $hidden = array('created_by', 'created_at', 'updated_by', 'updated_at');
        protected $fillable = array (
            'ten_phong_ban',
            'chu_thich'
        );
    
        public function congVans()
        {
            return $this->hasMany(CongVanPB::class, 'ma_phong_ban', 'id');
        }

        public function updatedBy()
        {
            return $this->belongsTo(User::class, 'updated_by', 'id');
        }
        public function createdBy()
        {
            return $this->belongsTo(User::class, 'created_by', 'id');
        }
}
