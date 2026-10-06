<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectService
{
    public function __construct(
        private ProjectRepositoryInterface $projectRepository
    ) {
    }

    public function getAllProjects(): Collection
    {
        return $this->projectRepository->getAll();
    }

    public function getProject(int $id): ?Project
    {
        return $this->projectRepository->findById($id);
    }

    public function createProject(array $data): Project
    {
        return $this->projectRepository->create(
            $this->mapInput($data)
        );
    }

    public function updateProject(Project $project, array $data): Project
    {
        return $this->projectRepository->update(
            $project,
            $this->mapInput($data)
        );
    }

    public function deleteProject(Project $project): bool
    {
        return $this->projectRepository->delete($project);
    }

    private function mapInput(array $data): array
    {
        return [
            'client_name' => $data['clientName'],
            'project_name' => $data['projectName'],
            'description' => $data['description'] ?? null,
            'status' => $data['status'],
            'priority' => $data['priority'],
            'start_date' => $data['startDate'] ?? null,
            'due_date' => $data['dueDate'] ?? null,
        ];
    }
}