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
		    'maxResults'    => 20
		];

    	// $search = Youtube::searchAdvanced($params, true);

    	$search = Youtube::paginateResults($params, null);
        
        $info = $search['info'];

        $nextpagetoken = $info['nextPageToken'];

        
		   	
    	return view('search.index', compact('search'));
    }
}
