<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;


enum StatusBooking: string implements HasLabel, HasIcon, HasColor
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Canceled = 'canceled';

    public function getLabel(): ?string
    {
        return match($this) {
            self::Pending => 'pending',
            self::Approved => 'approved',
            self::Canceled => 'canceled',
        };
    }

    public function getColor(): string|array|null
    {
       return match ($this) {
            self::Approved => 'succes',
            self::Canceled => 'danger',
            self::Pending => 'warning',
       }; 
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Pending => 'heroicon-o-clock',       
            self::Approved => 'heroicon-o-check-circle',
            self::Canceled => 'heroicon-o-x-circle',
        };
    }
}