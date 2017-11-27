<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongVanPB extends Model
{
    protected $table = 'tbl_cv_phongban';
    protected $hidden = array('created_by', 'created_at', 'updated_by', 'updated_at');
    protected $fillable = array (
        'ma_phong_ban',
    	'tieu_de_cv',
        'noi_dung_cv',
        'chu_thich'
    );

	public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
