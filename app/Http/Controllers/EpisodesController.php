<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        // $watchedEpisodes = $request->episodes;
        // $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
        //     $episode->watched = in_array($episode->id, $watchedEpisodes);
        // });

        $watchedEpisodes = $request->episodes;

        DB::transaction(function () use ($watchedEpisodes, $season) {
            DB::table('episodes')->where('season_id', $season->id)->whereIn('id', $watchedEpisodes)->update(['watched' => true]);
            DB::table('episodes')->where('season_id', $season->id)->whereNotIn('id', $watchedEpisodes)->update(['watched' => false]);
        });

        $season->push();

        return to_route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episódios marcados como assistidos');
    }
}
