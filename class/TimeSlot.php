s<?php
class TimeSlot
{
    public int $start;
    public int $end;

    public function __construct(int $start, int $end) {
        $this->start = $start;
        $this->end = $end;
    }

    public function toHtml(): string
    {
        return "<strong>{$this->start}h</strong> à <strong>{$this->end}h</strong>";
    }

    public function isHourIncluded(int $hour): bool
    {
        return $hour >= $this->start && $hour <= $this->end;
    }

    public function isThereACollision(TimeSlot $timeSlot): bool
    {
        return $this->isHourIncluded($timeSlot->start) ||
                $this->isHourIncluded($timeSlot->end) ||
                ($timeSlot->start < $this->start && $timeSlot->end > $this->end); 
    }
}