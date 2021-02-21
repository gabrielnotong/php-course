<?php
class Counter
{
    const INCREMENT = 1;
    public string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function increment(): void
    {
        $counter = 1;
        if (file_exists($this->filePath)) {
            $counter = (int)file_get_contents($this->filePath);
            $counter += static::INCREMENT;
        } 
        file_put_contents($this->filePath, $counter);
    }

    function getAllViews(): int 
    {
        if (!file_exists($this->filePath)) {
            return 0;
        }    
        return file_get_contents($this->filePath);
    }

}