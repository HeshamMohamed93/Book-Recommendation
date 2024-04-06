<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateBookIntervalJob;
use App\Models\ReadingInterval;
use App\Notifications\SendSmsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadingIntervalController extends Controller
{
    public function submitInterval(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'start_page' => 'required|integer',
            'end_page' => 'required|integer',
        ]);

        $user = Auth::user();
        $data['user_id'] = $user->id;

        ReadingInterval::create($data);
        CalculateBookIntervalJob::dispatch($data['book_id']);
        $user->notify(new SendSmsNotification());

        return response()->json(['message' => 'Reading interval submitted successfully']);
    }
}
