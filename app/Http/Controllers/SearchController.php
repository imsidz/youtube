<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class SearchController extends Controller
{
    public function post(Request $request){

    	$req = $request->search;
    	$slug = str_slug($req);
  //   	$params = [
		//     'q'             => $request,
		//     'type'          => 'video',
		//     'part'          => 'id, snippet',
		//     'maxResults'    => 20
		// ];

  //   	// $search = Youtube::searchAdvanced($params, true);

  //   	$results = Youtube::paginateResults($params, null);
    	// Check if we have a pageToken
		// if (isset($search['info']['nextPageToken'])) {
		//     $params['pageToken'] = $search['info']['nextPageToken'];
		// }

    	return redirect()->route('search.show', [$slug]);
    }

    public function show($show){
    	
    	$request = str_replace("-", " ",$show);

    	$params = [
		    'q'             => $request,
		    'type'          => 'video',
		    'part'          => 'id, snippet',
            'order'         => 'viewCount',
		    'maxResults'    => 20
		];

    	// $search = Youtube::searchAdvanced($params, true);

    	$search = Youtube::paginateResults($params, null);
        
        // $video = Youtube::getVideoInfo('rie-hPVJ7Sw');
        // dd($search);
        $info = $search['info'];

        $nextpagetoken = $info['nextPageToken'];

        $results = $search['results'];

        // $next = iconv(mb_detect_encoding($sid, mb_detect_order(), true), "UTF-8", $sid);

		// dd($results);

        $slug = $show;
    	return view('search.index', compact('results', 'nextpagetoken', 'slug'));
    }

    public function next(Request $request, $show){
        $re = str_replace("-", " ",$show);
        // dd($request->all());    
        $params = [
            'q'             => $re,
            'type'          => 'video',
            'part'          => 'id, snippet, statistics',
            'maxResults'    => 20
        ];

        // $search = Youtube::searchAdvanced($params, true);

        $search = Youtube::paginateResults($params, $request->next);
        
        $info = $search['info'];

        $nextpagetoken = $info['nextPageToken'];

        $results = $search['results'];


        // $next = iconv(mb_detect_encoding($sid, mb_detect_order(), true), "UTF-8", $sid);

        // dd($results);

        $slug = $show;
        return view('search.index', compact('results', 'nextpagetoken', 'slug'));
    }

    public function watch($videoid){
        $video = Youtube::getVideoInfo($videoid);

        $relatedVideos = Youtube::getRelatedVideos($videoid);
        return view('watch.show', compact('video', 'relatedVideos'));
    }
}
