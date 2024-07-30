<?php

namespace App\Exceptions;

use Exception;

class CannotLikeItem extends Exception
{
    public static function alreadyLiked(string $item): self
    {
        return new self("Le sujet {$item} ne peut pas être aimé plusieurs fois");
    }
}
