<?php

namespace App\Http\Controllers;

use App\Jobs\SocketVideo;
use App\Models\User;
use Illuminate\Http\Request;

class LiveTeachingController extends Controller
{
    public function index()
    {
        $usersStreaming = User::query()->where('is_streaming', 1)->get();
        return view('liveTeachings.index', compact('usersStreaming'));
    }

    public function startLive()
    {
        if (auth()->user()->is_streaming === 1) {
            return redirect()->route('live-teaching.index');
        }
        $ownerLive = auth()->user();
        SocketVideo::dispatch('createroom', "owner_$ownerLive->id");
        auth()->user()->update(['is_streaming' => 1]);
        return view('liveTeachings.live', compact('ownerLive'));
    }

    public function joinLive(Request $request, $ownerId)
    {
        $ownerLive = User::query()->findOrFail($ownerId);
        return view('liveTeachings.live', compact('ownerLive'));
    }

    public function offLive(Request $request)
    {
        $ownerUser = User::query()->where('id', $request['ownerId'])->where('is_streaming', 1)->first();
        if (!$ownerUser) {
            abort(403);
        }
        SocketVideo::dispatch('closeroom', "stream_$ownerUser->id");
        $ownerUser->update(['is_streaming' => 0]);
        return response()->json(['success' => 1]);
    }
}
