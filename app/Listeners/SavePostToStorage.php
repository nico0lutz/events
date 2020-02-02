<?php

namespace App\Listeners;

use App\Events\PostSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Storage;
use Carbon\Carbon;
class SavePostToStorage
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
     * @param  PostSaved  $event
     * @return void
     */
    public function handle(PostSaved $event)
    {
        $post = $event->post;
        
        $author = $post->author;
        $title = $post->title;
        $content = $post->content;

        $filename = Carbon::now() . $author;
        $text = "Author: " . $author . "\nTitle: " . $title . "\nContent: " . $content;

        Storage::put($filename, $text);
    }
}
