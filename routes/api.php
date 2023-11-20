<?php

use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route:: controller(StudentController::class)->group(function ()
{
     Route:: post("poststudents",'postuserdata');
}
);

Route:: controller(StudentController::class)->group(function ()
{
     Route:: get("getstudents",'getuserdata');
     Route:: get("getstudents/{id}",'showuserdata');
}
);
Route:: controller(StudentController::class)->group(function ()
{
     
     Route:: put("getstudents/{id}/update",'updateuserdata');
});

Route:: controller(StudentController::class)->group(function ()
{
     
     Route:: delete("getstudents/{id}/delete",'deleteuserdata');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
