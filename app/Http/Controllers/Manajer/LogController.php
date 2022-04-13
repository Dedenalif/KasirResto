<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Carbon;

class LogController extends Controller
{
    public function index()
    {
        $data = Activity::join('users', 'users.id', '=', 'causer_id')
            ->whereDate('activity_log.created_at',Carbon::now())
            ->select('activity_log.created_at as tgl_activity', 'activity_log.description', 'users.name')
            ->orderBy('tgl_activity','DESC')
            ->get();
        // dd($data);
        return view('log.index', compact('data'));
    }
}
