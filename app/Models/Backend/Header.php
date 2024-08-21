<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Header extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "image",
        "content",
        "isPrimary",
    ];

    public function casts(): array
    {
        return [
            "isPrimary" => "boolean",
        ];
    }

    public function getLargeImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::url('images/lg/' . $this->image) : null;
    }

    public function getMediumImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::url('images/md/' . $this->image) : null;
    }
    public function getSmallImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::url('images/sm/' . $this->image) : null;
    }
    public function getExtraSmallImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::url('images/xs/' . $this->image) : null;
    }
}
