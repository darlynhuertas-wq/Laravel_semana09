<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB; // ◄--- REVISA QUE ESTÉ ESTA LÍNEA
 
class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Apagamos la validación en MySQL
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Categoria::truncate();
 
        $categorias = [
            ['descripcion' => 'Electrónica'],
            ['descripcion' => 'Ropa y Accesorios'],
            ['descripcion' => 'Alimentos y Bebidas'],
            ['descripcion' => 'Hogar y Jardín'],
            ['descripcion' => 'Deportes'],
        ];
 
        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
 
        // 2. Volvemos a encender la validación
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
        $this->command->info('✔ Categorías insertadas: ' . count($categorias));
    }
}