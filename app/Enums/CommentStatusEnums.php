<?php

namespace App\Enums;

Enum CommentStatusEnums: string
{
    case AWAIT = 'await';
    case PUBLISHED = 'published';
    case DECLINED = 'declined';
}
