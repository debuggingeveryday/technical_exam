<?php

namespace App\Http\Controllers;

use App\Models\UserLikes;
use App\Http\Requests\UserLikesRequest;
use Inertia\Inertia;

class UserLikesController extends Controller
{
    public function index() {
        $data = UserLikes::where('user_id', auth()->user()->id)->get();

        return Inertia::render('YourLikes', [
            'response' => $data
        ]);
    }

    public function like(UserLikesRequest $request) {
        $auth_id = auth()->user()->id;

        tap(UserLikes::updateOrCreate([
            'image_url' => $request->image_url,
        ]), function ($instance) use ($auth_id) {
                $instance->fill([
                    'user_id' => $auth_id,
                    'is_like' => !$instance->is_like,
                ]);

                $instance->save();
        });
    }
}
