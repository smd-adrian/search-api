<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        try {
            $name = trim($request->input('name'));
            $percentage = $request->input('percentage');
            $parts = explode(" ", $name);
            $first_name = $parts[0];
            $last_name = implode(" ", array_slice($parts, 1));
            $matches = array();

            DB::table('dictionaries')
                ->orderBy('id')
                ->chunk(100, function (Collection $data) use ($first_name, $last_name, $percentage, &$matches) {
                    foreach ($data as $value) {
                        $parts = explode(" ", $value->name);
                        $first_match = $parts[0] === $first_name;
                        $last_match = similar_text($last_name, implode(" ", array_slice($parts, 1)), $percent) >= ($percentage / 100);

                        if ($first_match && $last_match && intval($percent) <= $percentage) {
                            $result = (array) $value;
                            $result['percentage'] = round($percent);
                            $matches[] = $result;
                        }
                    }
                });

            return response()->json([
                'data' => $matches,
                'message' => (!empty($matches) ? 'Successful with results.' : 'Successful with no results.'),
                'success' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false
            ]);
        }
    }

    public function show(Search $search, Request $request)
    {
        return response()->json($search->load('searchItems'));
    }
}
