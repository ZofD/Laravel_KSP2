<?php



enum Environment: string
{
    case ATMOSPHERE = 'atmosphere';
    case VACUUM = 'vacuum';

    public function zoneLabels(): array
    {
        return match ($this) {
            self::ATMOSPHERE => ['Atmosfera', 'Próżnia'],
            self::VACUUM => ['Próżnia'],
        };
    }

    public function zones(): array
    {
        return match ($this) {
            self::ATMOSPHERE => ['atmosphere', 'vacuum'],
            self::VACUUM => ['vacuum'],
        };
    }

    public function toSelectOptions(): array
    {
        return array_map(
            fn($label, $value) => ['label' => $label, 'value' => $value],
            $this->zoneLabels(),
            $this->zones()
        );
    }

    public function isZoneInEnvironment(string $zone): bool
    {
        return in_array($zone, $this->zones(), true);
    }
}