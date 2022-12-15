<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'role';

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable = field yang boleh di isi oleh frontend
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many
    public function role_user()
    {
        // 2 parameters (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
    }

     // one to many
     public function permission_role()
     {
         // 2 parameters (path model, field foreign key)
         return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
     }
}
