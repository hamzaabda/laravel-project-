<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Afficher toutes les tâches
    public function index()
    {
        return response()->json(Task::all());
    }

    // Ajouter une tâche
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|integer',
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    // Afficher une tâche par ID
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }

        return response()->json($task);
    }

    // Modifier une tâche
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'priority' => 'sometimes|required|integer',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    // Supprimer une tâche
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tâche non trouvée'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Tâche supprimée avec succès']);
    }
}
