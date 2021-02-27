<?php
class GuestBook
{
    private string $file;

    public function __construct(string $file)
    {
        $directory = dirname($file);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        if (!file_exists($file)) {
            touch($file);
        }

        $this->file = $file;
    }

    public function addMessage(Message $message): bool
    {
        if (!$handle = fopen($this->file, 'a')) {
            return false;
        }

        if(fwrite($handle, $message->toJson() . PHP_EOL) === FALSE) {
            return false;
        }

        fclose($handle);

        return true;
    }

    public function getMessages(): array
    {
        if (!$handle = @fopen($this->file, 'r')) {
            return [];
        }

        $messages = [];
        while(($line = fgets($handle)) !== FALSE) {
            $messages[] = Message::fromJson($line);
        }

        fclose($handle);

        return $messages;
    }
}