<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class FileController extends Controller
{
    public function myFiles(?string $folder = null): Response
    {
        if ($folder) {
            $folder = File::query()->where('created_by', Auth::id())
                ->where('path', $folder)
                ->firstOrFail();
        }

        if (! $folder) {
            $folder = $this->getRoot();
        }

        $files = File::query()
            ->where('parent_id', $folder->id)
            ->where('created_by', Auth::id())
            ->orderBy('is_folder', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $files = FileResource::collection($files);

        return Inertia::render('MyFiles', compact('files', 'folder'));
    }

    public function createFolder(StoreFolderRequest $request): void
    {
        $data = $request->validated();

        $parent = $request->parent;

        if (! $parent) {
            $parent = $this->getRoot();
        }

        $file = new File();
        $file->is_folder = true;
        $file->name = $data['name'];

        $parent->appendNode($file);
    }

    protected function getRoot(): mixed
    {
        return File::query()
            ->whereIsRoot()
            ->where('created_by', Auth::id())
            ->firstOrFail();
    }
}
