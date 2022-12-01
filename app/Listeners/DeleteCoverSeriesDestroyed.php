<?php

namespace App\Listeners;

use App\Events\SeriesDestroyed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class DeleteCoverSeriesDestroyed implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SeriesDestroyed  $event
     * @return void
     */
    public function handle(SeriesDestroyed $event)
    {
        if($event->cover != 'series_cover/no_cover.jpg'){
            Storage::disk('public')->delete([$event->cover]);
        }
    }
}
