<div>
    <h1>Todos</h1>
    <form action="">
        <input type="text" placeholder="Add new todo" wire:model.lazy="todo">
        @if (! $todo_edit)
            <button wire:click.prevent="addTodo">Add</button>
        @else
            <button wire:click.prevent="updateTodo">Update</button>
        @endif

        <p>@error('todo') {{ $message }} @enderror</p>
    </form>
    
    @foreach ($todos as $item)
        <li>
            {{ $item->name }} 
            <button wire:click="removeTodo({{ $item->id }} )">x</button>
            <button wire:click="editTodo({{ $item->id }} )">update</button>
        </li>
    @endforeach
</div>
