<?php
class Message
{
    private string $username;
    private string $message;
    private DateTime $date;

    public function __construct(string $username, string $message, DateTime $createdAt = null)
    {
        $this->username = $username;
        $this->message = htmlentities(trim($message));
        $this->date = $createdAt ?? new DateTime();
    }

    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if (strlen($this->message) < 10) {
            $errors['message'] = 'Message must have at least 3 characters';
        }

        if (strlen($this->username) < 3) {
            $errors['username'] = 'Username must have at least 3 characters';
        }

        return $errors;    
    }

    public function toHtml(): string
    {
        return "<p><strong>{$this->username}</strong> <em>on {$this->date->format('Y-m-d H:i:s')}</em><br>{$this->message}</p>";
    }

    public function toJson(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }

    public static function fromJson(string $message): self
    {
        $message = json_decode($message, true);
        return new static($message['username'], $message['message'], new DateTime("@" . $message['date']));
    }
}