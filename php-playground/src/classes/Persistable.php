<?php


interface Persistable
{
    const TYPE_DB = 1;            // const constante de classe et define est une constante globale
    const TYPE_FILE = 2;            // accessible de l'extérieur via persistable::TYPE_FILE comme les function static

    // Juste les définitions des méthodes publiques
    public function persist(string $message);            // Le typage provient de PHP 7
}