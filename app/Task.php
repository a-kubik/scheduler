<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = ['title','description','startDate','user_id','duration','priority','time','category_id'];

    public function actual() {
        $today = Carbon::now()->toDateString();


    }
}
