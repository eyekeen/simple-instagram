<?php

namespace App\Application\Request;

use App\Application\Alerts\Error;

trait RequestValidation {

    private array $errors = [];

    protected function validate(array $data, array $rules): array|bool {

        foreach ($rules as $key => $rule) {
            foreach ($rule as $item) {
                switch ($item) {
                    case 'required':
                        if (empty($data[$key])) {
                            $this->errors[$key][] = "Field $key is empty";
                        }

                        break;
                    case 'email':
                        if (!filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$key][] = "Not valid email";
                        }
                        break;
                    default:
                        break;
                }
            }
        }
        
        Error::store($this->errors);
        
        return $this->errors;
    }
    
    public function validationStatus(): bool {
        return empty($this->errors);
    }
    
    public function validationErrors(): array {
        return $this->errors;
    }
}
