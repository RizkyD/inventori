<?php

namespace App\Http\Controllers\Services;

use App\Models\Type;

class TypeService
{
    public function store(array $data)
    {
        return Type::create($data);
    }

    public function update(array $data, $id)
    {
        $type = Type::findOrFail($id);
        $type->update($data);
    }
    
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
    }
}