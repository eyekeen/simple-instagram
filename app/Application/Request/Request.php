<?php

namespace App\Application\Request;

class Request implements RequestInterface {

    use RequestValidation;

    private array $post;
    private array $get;
    private array $files;

    public function __construct(array $post, array $get, array $files) {
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
    }

    public function get(string $key): mixed {
        return $this->get[$key] ?? NULL;
    }

    public function post(string $key = null): mixed {
        return isset($key) ? $this->post[$key] : $this->post;
    }

    public function file(string $key): mixed {
        return $this->files[$key] ?? NULL;
    }

    public function validation(array $rules): array|bool {
        return $this->validate(
                $this->post,
                $rules
        );
    }
}
