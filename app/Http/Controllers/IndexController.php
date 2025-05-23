<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $data = session('configuration', []);

        $categories = [
            'processor' => 'Процессор',
            'motherboard' => 'Материнская плата',
            'cooler' => 'Кулер',
            'storage' => 'Накопитель',
            'ram' => 'Оперативная память',
            'videocard' => 'Видеокарта',
            'psu' => 'Блок питания',
            'chassis' => 'Корпус',
        ];

        return view('index', [
            'data' => $data,
            'categories' => $categories,
        ]);
    }

    public function update($type, $id)
    {
        $configuration = session('configuration', []);

        $configuration[$type] = $id;

        session(['configuration' => $configuration]);

        return redirect()->route('index')->with('success', 'Компонент успешно добавлен');
    }

    public function store(Request $request)
    {
        $build = session('configuration', []);

        $requiredComponents = [
            'processor', 'motherboard', 'cooler', 'ram',
            'storage', 'videocard', 'psu', 'chassis',
        ];

        $missing = array_diff($requiredComponents, array_keys($build));

        if (!empty($missing)) {
            return redirect()->back()->withErrors([
                'message' => 'Выберите недостающие компоненты: ' . implode(', ', $missing),
            ]);
        }

        Configuration::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,
            'processor_id' => $build['processor'],
            'motherboard_id' => $build['motherboard'],
            'cooler_id' => $build['cooler'],
            'ram_id' => $build['ram'],
            'storage_id' => $build['storage'],
            'videocard_id' => $build['videocard'],
            'psu_id' => $build['psu'],
            'chassis_id' => $build['chassis'],
        ]);

        session()->forget('configuration');

        return redirect()->route('index')->with('success', 'Сборка сохранена!');
    }
}
