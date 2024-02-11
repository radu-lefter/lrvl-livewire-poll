<div>
    @forelse ($polls as $poll)
    <div class="mb-4 p-4 border border-gray-200 rounded">
      <h3 class="mb-4 text-xl">
        {{ $poll->title }}
      </h3>
      @foreach ($poll->options as $option)
        <div class="mb-2">
          <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
          {{ $option->name }} ({{ $option->votes->count() }})
        </div>
      @endforeach
      <button class="btn bg-red-500 text-white" wire:click="deletePoll({{ $poll->id }})" onclick="confirm('Are you sure you want to delete this poll?') || event.stopImmediatePropagation()">Delete Poll</button>
    </div>
  @empty
    <div class="text-gray-500">
      No polls available
    </div>
  @endforelse
</div>
