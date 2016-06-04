<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Carbon\Carbon;

use App\Video;

class VideosApiController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('videos');

        if ($request->has('realisator')) {
            $realisator = $request->input('realisator');
            $query->where('realisator', 'like' , "%$realisator%");
        }

        if ($request->has('from')) {
            $from = $request->input('from');
            $date = Carbon::createFromFormat('Ymd', $from)->toDateTimeString();
            $query->where('date', '>' , $date);
        }

        if ($request->has('to')) {
            $to = $request->input('to');
            $date = Carbon::createFromFormat('Ymd', $to)->toDateTimeString();
            $query->where('date', '<' , $date);
        }

        $videos = $query->get();

        return response()->json([
            'videos' => $videos,
            'count' => count($videos),
            ]);
    }

    public function show($id)
    {
        $video = Video::find($id);

        return response()->json([
            'video' => $video,
            ]);
    }
}
