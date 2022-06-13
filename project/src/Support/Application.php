<?php

namespace Support;

class Application extends \Illuminate\Foundation\Application
{
    /**
     * @inheritdoc
     */
    public function path($path = ''): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'App' .
            DIRECTORY_SEPARATOR . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    public function configPath($path = ''): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Support' .
            DIRECTORY_SEPARATOR . 'Config'. DIRECTORY_SEPARATOR . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    public function databasePath($path = ''): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Support' .
            DIRECTORY_SEPARATOR . 'Database'. DIRECTORY_SEPARATOR . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    public function langPath($path = ''): string
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Support' .
            DIRECTORY_SEPARATOR . 'Languages'. DIRECTORY_SEPARATOR . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
