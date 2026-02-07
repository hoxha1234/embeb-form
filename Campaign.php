<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model {
    protected $fillable = ['name', 'authorized_domain', 'tag', 'privacy_policy_url', 'terms_conditions_url', 'status'];
}