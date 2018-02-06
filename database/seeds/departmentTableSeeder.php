<?php

use Illuminate\Database\Seeder;

use App\Csvdata;

class departmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //clear out staging table

        DB::table('csv_data')->truncate();
        DB::table('department')->delete();
        DB::statement('ALTER TABLE department AUTO_INCREMENT=0;');


        //Load tab-delimited file for medications
        if (($handle = fopen ( public_path('department_list.txt'), 'r' )) !== FALSE) {
            while ($data = fgetcsv ($handle, 1000, "\t")) {

                $csv_data = new Csvdata ();
                $csv_data->department_list = $data[0];
                $csv_data->save();

            }
            fclose ($handle);
        };

        //Load lookup_value
        $select_deplist = DB::table('csv_data')
            ->get(array('department_list'));

        foreach($select_deplist as $data){
            DB::table('department')->insert(
                [
                    'department_name' => $data->department_list,
                    'created_by'=>1
                ]);
        }

    }
}
