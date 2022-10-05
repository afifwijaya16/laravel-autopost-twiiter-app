<?php

namespace App\Imports;

use App\Models\Posttwitter;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {		
        foreach ($rows as $row) 
        {
            Posttwitter::create([
                'post' => $row['post'],
                'url_image_post'=> $row['url_image'],
                'day_post'=> $row['day'],
                'time_post'=> $this->transformDate($row['time'])
            ]);
        } 
    }

    public function transformDate($value, $format = 'H:i')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
