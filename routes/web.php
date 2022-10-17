<?php

use App\WithChoicesJs;

use App\Http\Livewire\Profile;
use App\Http\Livewire\ShowPost;
use App\Http\Livewire\Users\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select\Demo\Choices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', Profile::class);
Route::get('/posts', ShowPost::class);
Route::get('/users', Index::class);



Route::get('/select/choices', Choices::class);


Route::get('/api/users', function (Request $request) {
    $users = User::where('name', 'like', "%{$request->q}%")->orderBy('name')->get();

    // dd(mapModelsToChoicesOptions($users));
    logger($users->count());


    return mapModelsToChoicesOptions($users);
});


function mapModelsToChoicesOptions(
    EloquentCollection $models,
    $label = 'name',
    $id = 'id'
) {
    $choicesOptionStub = collect(['value', 'label', 'selected', 'disabled']);
    $choicesOptions = [];

    foreach ($models as $model) {
        $choicesOptions[] = $choicesOptionStub->combine([$model->$id, $model->$label, false, false])->all();
    }

    return $choicesOptions;
}
