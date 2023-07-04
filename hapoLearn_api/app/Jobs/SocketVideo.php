<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class SocketVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $value, $eventName;
    public function __construct($eventName, $value)
    {
        $this->eventName = $eventName;
        $this->value = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $redis = Redis::connection();
        $redis->publish($this->eventName, $this->value);
    }
}
