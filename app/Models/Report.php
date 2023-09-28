<?php

namespace App\Models;

use App\Application\Database\Model;

class Report extends Model {

    protected string $table = 'reports';
    protected array $fields = ['email', 'subject', 'message'];
    protected string $email;
    protected string $subject;
    protected string $message;

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function getMessage(): string {
        return $this->message;
    }
}
