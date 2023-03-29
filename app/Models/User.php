<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "users";
    protected $primerikey = 'id';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'address',
        'phone',
        'status',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles');
    }

    public static function users()
    {
        return User::orderBy('id')->paginate(5);
    }

    public static function store(Request $request)
    {
        $users = $request->all();
        $request->session()->flash('success');
        return User::create($users);
    }

    public static function show($id)
    {
        return User::all()->find($id);
    }

    public static function edit($id, Request $request)
    {
        $data = $request->all();
        $record = User::find($id);
        $record->name = $data['name'];
        $record->password = $data['password'];
        $record->address = $data['address'];
        $record->phone = $data['phone'];
        $record->status = $data['status'];

        $record->save();
        $request->session()->flash('update');
    }

    public static function remove($id, Request $request)
    {
        $user = User::all()->find($id);
        $request->session()->flash('delete');
        return $user->delete();
    }

}
