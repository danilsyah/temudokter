<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'type_user';

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable = field yang boleh di isi oleh frontend
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many table detail_user
    public function detail_user()
    {
        // 2 parameters (path model, field foreign key)
        return $this->hasMany('App\Models\ManagemenAccess\DetailUser', 'type_user_id');
    }
}
