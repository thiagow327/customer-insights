<?php

namespace App\Enums;

enum StatusEnum: string
{
    case ABERTO = 'aberto';
    case EM_ANDAMENTO = 'em_andamento';
    case FECHADO = 'fechado';
}
