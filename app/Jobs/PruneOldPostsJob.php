<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PruneOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $allPosts =Post::orderBy('created_at', 'desc')->paginate(7);
        // Carbon::resetToStringFormat();
        foreach($allPosts as $post){
            Post::where('created_at', '<=', Carbon::now()->subYears(2)->toDateTimeString())->delete();
            // Post::where('years','2')->delete();

        }
        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }
}
