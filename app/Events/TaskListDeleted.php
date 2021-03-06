<?php

namespace App\Events;

use App\Traits\Undoable;

use Spatie\EventProjector\ShouldBeStored;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class TaskListDeleted implements ShouldBeStored
{
    use Dispatchable, Undoable;

    /** @var array */
    public $taskListAttributes;

    /** @var array */
    //public $meta_data; // Commented out to avoid serialization issues

    /** @var string */
    public $undoEvent = TaskListCreated::class;

    /** @var array */
    public $undoAttributes = ['taskListAttributes'];

    /**
     * Create a new event instance.
     *
     * @param array $taskListAttributes
     * @param array $meta_data
     * @return void
     */
    public function __construct(array $taskListAttributes, array $meta_data = [])
    {
        $this->taskListAttributes = $taskListAttributes;
        $this->meta_data = $meta_data;
    }

}
