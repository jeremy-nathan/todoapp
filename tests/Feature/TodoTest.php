<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Todo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

    public function test_get_all_todos()
    {
        Todo::factory()->count(3)->make();
        $response = $this->get('/todo');

        $response->assertStatus(200);
    }

    public function test_create_a_todo(){

        $todo = Todo::factory()->make()->toArray();

        $this->post('/todo',$todo)
            ->assertStatus(302); //store() method has a redirect method : back() which returns a

        $this->assertDatabaseHas('todos',$todo);

    }

    public function test_can_get_validation_error_when_trying_to_create_an_empty_todo(){

        $this->post('/todo',['title'=>null])
            ->assertStatus(302);
    }

    public function test_mark_todo_as_complete(){

        $todo = Todo::factory()->create();

        $todo->update(['completed'=>1]);

        $this->put(route('todo.update',[$todo]))
            ->assertStatus(302);

        $this->assertDatabaseHas('todos',[
            'completed'=>1
        ]);

    }

    public function test_mark_todo_as_incomplete(){

        $todo = Todo::factory()->create(['completed'=>1]);

        $todo->update(['completed'=>0]);

        $this->put(route('todo.update',[$todo]))
            ->assertStatus(302);

        $this->assertDatabaseHas('todos',[
            'completed'=>0
        ]);
    }


    public function test_delete_a_todo(){

        $todo = Todo::factory()->create();

        $this->delete(route('todo.destroy',[$todo]))
            ->assertStatus(302);

        $this->assertDeleted($todo);

    }



    public function test_delete_all_todos(){

        $todo = Todo::factory()->count(3)->create();

        $this->delete('todo/clear')
            ->assertStatus(302);

        $this->assertDatabaseCount('todos',0);

    }


}
