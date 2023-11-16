<?php

namespace App\Livewire\Utils;

use Livewire\Component;

class Alert extends Component
{
    public $message = '';
    public $type = 'success'; // Padrão: sucesso
    public $showCloseButton = true; // Mostrar botão de fechar
    public $timer = null; // Temporizador em segundos (null para desativar)
    public $mostrarAlert = false;

    protected $listeners = ['alert'];

    public function mount(){
        
    }

    public function alert($message, $type = 'success', $options = [])
    {
        $this->message = $message;
        $this->type = $type;
        $this->showCloseButton = $options['showCloseButton'] ?? true;
        $this->timer = $options['timer'] ?? null;

        $this->mostrarAlert = true; // Mostrar o alerta
    }

    public function close()
    {
        $this->mostrarAlert = false; // Este método fecha o alerta
    }

    public function render()
    {
        return view('livewire.alert.alert');
    }

}
