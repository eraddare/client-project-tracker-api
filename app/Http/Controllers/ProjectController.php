<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function __construct(
        private ProjectService $projectService
    ) {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->projectService->getAllProjects(),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $project = $this->projectService->getProject($id);

        if (!$project) {
            return response()->json([
                'message' => 'Project not found.',
            ], 404);
        }

        return response()->json([
            'data' => $project,
        ]);
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $project = $this->projectService->createProject(
            $request->validated()
        );

        return response()->json([
            'message' => 'Project created successfully.',
            'data' => $project,
        ], 201);
    }

    public function update(
        ProjectRequest $request,
        int $id
    ): JsonResponse {
        $project = $this->projectService->getProject($id);

        if (!$project) {
            return response()->json([
                'message' => 'Project not found.',
            ], 404);
        }

        $project = $this->projectService->updateProject(
            $project,
            $request->validated()
        );

        return response()->json([
            'message' => 'Project updated successfully.',
            'data' => $project,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $project = $this->projectService->getProject($id);

        if (!$project) {
            return response()->json([
                'message' => 'Project not found.',
            ], 404);
        }

        $this->projectService->deleteProject($project);

        return response()->json([
            'message' => 'Project deleted successfully.',
        ]);
    }
}