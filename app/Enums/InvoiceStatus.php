<?php
declare(strict_types=1);
namespace Enums;

enum InvoiceStatus:int
{
    case Pending = 0;
    case Paid = 1;
    case Declined = 2;
}
