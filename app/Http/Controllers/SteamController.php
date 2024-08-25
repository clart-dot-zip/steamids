<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Syntax\SteamApi\Facades\SteamApi;

class SteamController extends Controller
{
    public function search(Request $request)
    {
        $steamid = $request->input('steamid');
        
        // Perform search logic with $steamid
        // Example: Fetch data from an API or database
        $player = SteamApi::user($steamid)->GetPlayerSummaries()[0];
        $name = $player->personaName;
        $validSteamID = $player->steamIds->communityId;
        $steamID64 = $player->steamId;
        $avatar = $player->avatarFullUrl;
        $profileUrl = $player->profileUrl;
        $steamAccCreated = $player->timecreated;
        
        $results = [
            'steamid' => $validSteamID,
            'name' => $name,
            'profileUrl' => $profileUrl,
            'steamAccCreated' => $steamAccCreated,
            'steamID64' => $steamID64,
            'avatar' => $avatar
        ];

        // Redirect back to the dashboard with the results
        return redirect()->route('dashboard')->with('searchResults', $results);
    }
}
