<?php

namespace App\Http\Livewire;

use App\Todo;
use Livewire\Component;

class TodoMvc extends Component
{
    public $todos = [];
    public $todo = '';
    public $todo_edit = 0;

    public function addTodo()
    {
        $this->validate([
            'todo' => 'required|min:6',
        ]);

        Todo::create([
            'name' => $this->todo
        ]);

        $this->todo = '';
    }

    public function removeTodo($id)
    {
        Todo::destroy($id);
    }

    public function editTodo($id)
    {
        $this->todo = Todo::findOrFail($id)->name;
        $this->todo_edit = $id;
    }

    public function updateTodo()
    {
        Todo::where('id', $this->todo_edit)
                ->update(['name' => $this->todo]);
        
        $this->todo = '';
        $this->todo_edit = 0;
    }

    public function render()
    {
        $this->todos = Todo::all();
        return view('livewire.todo-mvc');
    }
}
