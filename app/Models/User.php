<?php

namespace App\Models;

use App\Models\Enum\AdminEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password',
		'is_admin'
	];

	protected $hidden = [
		'password',
		'remember_token',
		'is_admin'
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function setPasswordAttribute($password): void
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function isAdmin(): bool
	{
		return $this->is_admin === AdminEnum::Admin->value;
	}
}
