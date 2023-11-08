<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Facades\Config;



class BDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Request $request): void
    {


        // $handle = fopen($filePath, 'r');
        //  DB::disableQueryLog();
    DB::table('bd')->truncate();

    LazyCollection::make(function () {
        $filePath = Config::get('custom.csv_file_path');

      $handle = fopen(public_path('Database.csv'), 'r');
      
      while (($line = fgetcsv($handle, 4096)) !== false) {
        $dataString = implode(', ', $line);
        $row = explode(',', $dataString);
        yield $row;
      }

      fclose($handle);
    })
    ->skip(1)
    ->chunk(1000)
    ->each(function (LazyCollection $chunk) {
        $records = $chunk->map(function ($row) {
            return [
                "create_date" => $row[0],  // Assign the value from $row[0] to the 'create_date' column
                "email_sent_date" => $row[1], // Map other columns to values from $row as needed
                "company_source" => $row[2],
                "contact_source" => $row[3],
                // "database_creator_name" => $row[4],
                // "technology" => $row[5],
                // "client_speciality" => $row[6],
                // "client_name" => $row[7],
                // "street" => $row[8],
                // "city" => $row[9],
                // "state" => $row[10],
                // "zip_code" => $row[11],
                // "country" => $row[12],
                // "website" => $row[13],
                // "first_name" => $row[14],
                // "last_name" => $row[15],
                // "designation" => $row[16],
                // "email" => $row[17],
                // "email_response_1" => $row[18],
                // "email_response_2" => $row[19],
                // "rating" => $row[20],
                // "followup" => $row[21],
                // "linkedin_link" => $row[22],
                // "employee_count" => $row[23] // Assigning 'employee_count' from $row[0]
            ];
        })->toArray();
        
        DB::table('bd')->insert($records);
        
    
    });
    }
}
