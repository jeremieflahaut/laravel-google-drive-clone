<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class FileController extends Controller
{
    public function myFiles(): Response
    {
        return Inertia::render('MyFiles');
    }
}
