<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Model 
{
	//use Notifiable;
	use \Illuminate\Auth\MustVerifyEmail;
	
    protected $table = "users";
	protected $primaryKey = "id_user";
	public $timestamps = false;
	
	protected $fillable = [
	'Ufnama','email', 'password',
	];
	
	protected $hidden = [
	'password',
	];
}