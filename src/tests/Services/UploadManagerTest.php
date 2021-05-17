<?php

namespace Tests\Services;

use App\Services\UploadManager;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadManagerTest extends TestCase
{
    public function testIsGeneratePathCreatingAPath()
    {
        $uploadManager = new UploadManager();
        $expected = sprintf('%s/%s', storage_path('public'), 'test');

        $file = UploadedFile::fake()
            ->create('test', 500, 'txt');

        $request = new Request();
        $request->files->set('attachment', $file);

        self::assertSame($expected, $uploadManager->generatePath($request));
    }
}
