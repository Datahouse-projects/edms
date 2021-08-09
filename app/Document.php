<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'version', 'path','filename', 'end_retention_date',
        'extension', 'fileq','filling_date', 'upload_date', 'end_deletion',
    ];

    public function getIconAttribute() {

        $extensions = [
            'jpg' => 'jpeg.png',
            'png' => 'png.png',
            'pdf' => 'pdfdocument.png',
            'doc' => 'wordicon.jpg',
        ];

        return Arr::get($extensions,$this->extension,'unknown.png');
    }
}
