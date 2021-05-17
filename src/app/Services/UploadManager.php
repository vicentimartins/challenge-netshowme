<?php

namespace App\Services;

use Illuminate\Http\Request;

class UploadManager
{
    public  function generatePath(Request $request): string
    {
        $file = $request->file('attachment');

        return sprintf(
            '%s/%s',
            storage_path('public'),
            $file->getClientOriginalName()
        );
    }

    public function storeFile(Request $request): void
    {
        $file = $request->file('attachment');
        $originalName = $file->getClientOriginalName();

        $file->storeAs('public', $originalName);
    }
}
