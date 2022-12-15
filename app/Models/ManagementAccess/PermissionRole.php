<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'permission_role';

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable = field yang boleh di isi oleh frontend
    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     // one to many
     public function role()
     {
         // 3 parameters(path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
     }

      // one to many
      public function permission()
      {
          // 3 parameters(path model, field foreign key, field primary key from table hasMany/hasOne)
          return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
      }
}
