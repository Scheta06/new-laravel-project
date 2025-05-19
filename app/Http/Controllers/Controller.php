<?php
namespace App\Http\Controllers;

use App\Models\Chassis;
use App\Models\Chipset;
use App\Models\Cooler;
use App\Models\FormFactor;
use App\Models\MemoryCapacity;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\ProcessorGeneration;
use App\Models\Psu;
use App\Models\Ram;
use App\Models\Socket;
use App\Models\Storage;
use App\Models\TypeOfMemory;
use App\Models\Vendor;
use App\Models\Videocard;

abstract class Controller
{
    protected $processorInput;
    protected $motherboardInput;
    protected $coolerInput;
    protected $ramInput;
    protected $storageInput;
    protected $videocardInput;
    protected $psuInput;
    protected $chassisInput;
    protected $socket;
    protected $vendor;
    protected $chipset;
    protected $formFactor;
    protected $typeOfMemory;
    protected $memoryCapacity;
    protected $processorGeneration;

    public function __construct()
    {
        $this->processorInput   = Processor::with(['category', 'processorGeneration', 'socket', 'vendor'])->get();
        $this->motherboardInput = Motherboard::with(['category', 'chipset', 'socket', 'formFactor', 'vendor'])->get();
        $this->coolerInput      = Cooler::with(['category', 'vendor'])->get();
        $this->ramInput         = Ram::with(['category', 'memoryCapacity', 'typeOfMemory', 'vendor'])->get();
        $this->storageInput     = Storage::with(['category', 'memoryCapacity', 'vendor'])->get();
        $this->videocardInput   = Videocard::with(['category', 'memoryCapacity', 'typeOfMemory', 'vendor'])->get();
        $this->psuInput         = Psu::with(['category', 'formFactor', 'vendor'])->get();
        $this->chassisInput     = Chassis::with(['category', 'formFactor', 'vendor'])->get();

        $this->socket              = Socket::all();
        $this->vendor              = Vendor::all();
        $this->chipset             = Chipset::all();
        $this->formFactor          = FormFactor::all();
        $this->typeOfMemory        = TypeOfMemory::all();
        $this->memoryCapacity      = MemoryCapacity::all();
        $this->processorGeneration = ProcessorGeneration::all();
    }
}
