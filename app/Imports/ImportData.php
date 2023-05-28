<?php
namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportData implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
          
        return new Data([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'dob' => date('Y-m-d', strtotime($row['dob'])),
            'gender' => $row['gender'],
            'street' => $row['street'],
            'location' => $row['location'],
            'city' => $row['city'],
            'state' => $row['state'],
            'zip' => $row['zip'],
            'country' => $row['country'],
            'lat' => $row['lat'],
            'lang' => $row['lang'],
            'comment' => $row['comment']
        ]);
    }
}