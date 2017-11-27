<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Report extends Model
{

    protected $table = 'tbl_full_informations';
    protected $hidden = array('created_by', 'created_at');
    protected $fillable = array (
    	'status',
		'madvi',
		'tendvi',
		'diachi',
		'ma_quan',
		'thang',
		'du_dk',
		'_dk_bhxh',
		'_dk_bhyt',
		'_dk_bhtn',
		'_tien_dk',
		'_ps_bh',
		'_ps_yt',
		'_ps_tn',
		'_bst_bh',
		'_bst_yt',
		'_bst_tn',
		'_bsg_bh',
		'_bsg_yt',
		'_bsg_tn',
		'sld',
		'sldtn',
		'thanght',
		'_dt_bhxh',
		'_dt_bhyt',
		'_dt_bhtn',
		'_dt_lai',
		'du_ck',
		'_ck_bhxh',
		'_ck_bhyt',
		'_ck_bhtn',
		'_tien_ck',
		'sld_dk',
		'sldtn_dk',
		'_sldtang',
		'_sldgiam',
		'_sldtntang',
		'_sldtngiam',
		'_pst_bh',
		'_psg_bh',
		'_pst_yt',
		'_psg_yt',
		'_pst_tn',
		'_psg_tn',
		'_tientlbh',
		'_tientlyt',
		'_tientltn',
		'_lai1_ps',
		'_lai2_ps',
		'_lai3_ps',
		'_dk_lai1',
		'_dk_lai2',
		'_dk_lai3',
		'_ck_lai1',
		'_ck_lai2',
		'_ck_lai3',
		'thanghtyt'
    );
    public function donvi(){
    	return $this->belongsTo(User::class, 'madvi', 'username');
    }
    public function quan(){
    	return $this->belongsTo(TownShip::class, 'ma_quan', 'township_id');
    }
}
