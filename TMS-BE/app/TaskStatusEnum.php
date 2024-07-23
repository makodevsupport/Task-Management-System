<?php

namespace App;

enum TaskStatusEnum: string
{
    case INPROGRESS = 'in-progress';
    case COMPLETE = 'completed';
    case PENDING = 'pending';
}
