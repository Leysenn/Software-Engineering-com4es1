<?php  
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher; // Import the model

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 100 teacher records
        Teacher::factory()->count(100)->create();
    }
}
