<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

//دي بعملها في المود بتاع الادمن علشان استدعيها في الميدل وير
//middileware =>'can:products'
//ده ميدل وير بحطه علي الراوت الالي مش عايزه يظهر الا لليوزر الالي معمول ليه برميشن بس
//    public function hasAbilty($permissions){
//        $role =$this->role;
//          if(!$role){
//             return false;
//          }
//
//          foreach ($role->permissions as $permission){
//             if (is_array($permissions)&& in_array($permissions , $permission)){
//                 return true;
//             }elseif (is_array($permissions)&& in_array($permissions , $permission)==0){
//                 return true;
//             }
//
//          }
//         return false;
//    }

}
