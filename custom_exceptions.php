<?php

class UnauthorizedSenderException extends \Exception {
    public function __construct($message = "Remetente não autorizado.", $code = 0, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

class MissingFieldsException extends \Exception {
    public function __construct($message = "Todos os campos são obrigatórios.", $code = 0, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
