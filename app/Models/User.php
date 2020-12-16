<?php

namespace App\Models;

use App\Models\Base\User as BaseUser;
use Laravel\Cashier\Billable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends BaseUser implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
  use Notifiable, Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, Billable;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'stripe_id',
		'card_brand',
		'card_last_four',
		'trial_ends_at'
	];
}
